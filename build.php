<?php
require_once __DIR__ . '/vendor/autoload.php';

// Load Twig
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');
$twig = new \Twig\Environment($loader);

// Create output directory if it doesn’t exist
if (!is_dir(__DIR__ . '/dist')) {
    mkdir(__DIR__ . '/dist', 0777, true);
}

// List all Twig templates you want to render to static HTML
$pages = [
    'index.twig' => 'index.html',
    'dashboard.twig' => 'dashboard.html',
    'ticket.twig' => 'ticket.html'
];

// Render each template and save as HTML
foreach ($pages as $template => $outputFile) {
    $output = $twig->render($template);
    file_put_contents(__DIR__ . "/dist/$outputFile", $output);
    echo "✅ Rendered $template → dist/$outputFile\n";
}

echo "🎉 All pages built successfully!\n";