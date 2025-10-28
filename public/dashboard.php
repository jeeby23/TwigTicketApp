<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

// Initialize Twig
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../templates');
$twig = new Environment($loader);

// --- Optional: simple session-based access control (recommended) ---
session_start();

// If you later move login to backend PHP, you can do this:
// if (!isset($_SESSION['ticketapp_session'])) {
//     header('Location: login.php');
//     exit;
// }

// Example dashboard data (for now)
$stats = [
    'total' => 120,
    'open' => 35,
    'closed' => 85
];

$recentTickets = [
    ['id' => 1, 'subject' => 'Login issue', 'status' => 'Open', 'priority' => 'High'],
    ['id' => 2, 'subject' => 'Billing question', 'status' => 'Resolved', 'priority' => 'Low'],
    ['id' => 3, 'subject' => 'Feature request', 'status' => 'Open', 'priority' => 'Medium']
];

// Render the dashboard Twig view
echo $twig->render('dashboard.twig', [
    'stats' => $stats,
    'recentTickets' => $recentTickets,
    'showModal' => false
]);