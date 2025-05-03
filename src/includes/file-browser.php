<?php
function formatFileSize($bytes) {
    $units = ['B', 'KB', 'MB', 'GB', 'TB'];
    $factor = floor((strlen($bytes) - 1) / 3);
    return round($bytes / pow(1024, $factor), 2) . ' ' . $units[$factor];
}

function loadMetadata($path) {
    $metadataPath = $path . '/md.json';
    if (file_exists($metadataPath)) {
        return json_decode(file_get_contents($metadataPath), true);
    }
    return [];
}

function listDirectory($path, $basePath = '') {
    $files = glob($path . '/*');
    sort($files);
    $output = '';
    
    $metadata = loadMetadata($path);

    foreach ($files as $file) {
        $filename = basename($file);
        if ($filename === 'md.json') continue;
        
        $relativePath = str_replace($basePath, '', $file);
        $depth = substr_count($relativePath, '/') - 1;
        $padding = $depth * 20;
        
        $output .= '<tr class="level-' . $depth . '" data-path="' . htmlspecialchars($file) . '">';
        
        if (is_dir($file)) {
            $totalSize = 0;
            foreach (glob($file . '/*') as $subFile) {
                if (is_file($subFile)) {
                    $totalSize += filesize($subFile);
                }
            }
            
            $output .= '<td><div class="file-name" style="padding-left: ' . $padding . 'px"><img src="/img/gif/folder-point.gif" class="folder-toggle" alt="Toggle folder" width="24px" style="vertical-align: middle; cursor: pointer;"></div></td>';
            $output .= '<td><div class="file-name" style="padding-left: ' . $padding . 'px">' . $filename . '/</div></td>';
            $output .= '<td>' . ($metadata[$filename]['description'] ?? 'no description available, sorry!') . '</td>';
            $output .= '<td>' . formatFileSize($totalSize) . '</td>';
            $output .= '</tr>';
            
            $output .= listDirectory($file, $basePath);
        } else {
            $output .= '<td><div class="file-name" style="padding-left: ' . $padding . 'px"><a href="' . $file . '"><img src="/img/gif/dl.gif" alt="download" width="16px" style="vertical-align: middle;"></a></div></td>';
            $output .= '<td><div class="file-name" style="padding-left: ' . $padding . 'px"><a href="' . $file . '">' . $filename . '</a></div></td>';
            $output .= '<td>' . ($metadata[$filename]['description'] ?? 'no description available, sorry!') . '</td>';
            $output .= '<td>' . formatFileSize(filesize($file)) . '</td>';
            $output .= '</tr>';
        }
    }
    
    return $output;
}

function renderFileBrowser($title, $relativePath) {
    $docRoot = rtrim($_SERVER['DOCUMENT_ROOT'], '/');
    $basePath = $docRoot . '/archives/files';
    $path = $basePath . '/' . $relativePath;
    ?>
    <div class="head-img">
        <img src="/img/gif/folder.gif" alt="Animated folder icon" width="3%" style="vertical-align: middle;">
        <h1><?php echo htmlspecialchars($title); ?></h1>
    </div>
    <h2>/archives/files/<?php echo htmlspecialchars($relativePath); ?></h2>
    <table class="file-tb">
        <tr>
            <th>actions</th>
            <th>file/folder</th>
            <th>description</th>
            <th>size</th>
        </tr>
        <?php echo listDirectory($path, $path); ?>
    </table>
    <div class="head-img" style="margin-top: 10px;">
        <img src="/img/gif/alert.gif" alt="Animated warning icon" width="3%" style="vertical-align: middle;">
        <h1>notice to security researchers</h1>
    </div>
    <p>
        this is a <b>public mirror</b>. yes, i intend to publish these files to the public. please do not submit reports about these files being public.
    </p>
    <p>
        if you have a report about a security issue, please contact me via email at <a href="mailto:aidan@p0ntus.com">aidan@p0ntus.com</a>.
    </p>
    <?php
}
?>
<style>
    tr[data-path] {
        display: none;
    }
    tr.level-0 {
        display: table-row;
    }
    .folder-toggle {
        transition: transform 0.2s;
    }
    .folder-toggle.expanded {
        transform: rotate(90deg);
    }
    .file-name {
        display: flex;
        align-items: center;
        gap: 5px;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.folder-toggle').forEach(toggle => {
            toggle.addEventListener('click', function() {
                const row = this.closest('tr');
                const path = row.dataset.path;
                const level = parseInt(row.className.match(/level-(\d+)/)[1]);
                const nextLevel = level + 1;
                
                const isExpanded = this.classList.toggle('expanded');
                
                document.querySelectorAll(`tr[data-path^="${path}/"]`).forEach(subRow => {
                    if (subRow.className.includes(`level-${nextLevel}`)) {
                        subRow.style.display = isExpanded ? 'table-row' : 'none';
                    }
                });
            });
        });
    });
</script> 