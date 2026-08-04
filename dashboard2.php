<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: admin.php');
    exit();
}

$username = htmlspecialchars($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dashboard2.css" />
</head>
<body>
    
    <div class="dashboard-shell">
        <aside class="dashboard-nav">
            <div class="brand">Admin <span>Hub</span></div>
            <nav class="nav-links">
                <a class="active" href="#">Overview</a>
                <a href="#">Analytics</a>
                <a href="#">Users</a>
                <a href="#">Sales</a>
                <a href="logout.php" class="logout-link">Logout</a>
            </nav>
            <div class="nav-footer">
                <p>Quick actions</p>
                <a href="#" class="quick-action">Create report</a>
            </div>
        </aside>

        <main class="dashboard-main">
            <header class="dashboard-header">
                <div>
                    <p class="welcome">Welcome back, <strong><?php echo $username; ?></strong></p>
                    <h1>Creative admin dashboard</h1>
                    <p class="subtitle">Your control center for users, sales, and performance insights.</p>
                </div>
                <div class="header-actions">
                    <button class="btn btn-primary">Create report</button>
                    <button class="btn btn-secondary">View analytics</button>
                </div>
            </header>

            <section class="stats-grid">
                <article class="stat-card card-gradient">
                    <span>Active users</span>
                    <h2>1,248</h2>
                    <p>+12.3% since last week</p>
                </article>
                <article class="stat-card card-glow">
                    <span>New orders</span>
                    <h2>312</h2>
                    <p>Order volume is steady</p>
                </article>
                <article class="stat-card card-solid">
                    <span>Revenue</span>
                    <h2>$18.4K</h2>
                    <p>Monthly growth +8.7%</p>
                </article>
                <article class="stat-card card-soft">
                    <span>Support tickets</span>
                    <h2>24</h2>
                    <p>3 pending responses</p>
                </article>
            </section>

            <section class="widgets-grid">
                <article class="widget widget-activity">
                    <div class="widget-header">
                        <h2>Performance overview</h2>
                        <span>Updated 2 mins ago</span>
                    </div>
                    <div class="progress-list">
                        <div>
                            <label>Conversion</label>
                            <div class="progress-bar"><span style="width: 78%"></span></div>
                        </div>
                        <div>
                            <label>Engagement</label>
                            <div class="progress-bar"><span style="width: 62%"></span></div>
                        </div>
                        <div>
                            <label>Retention</label>
                            <div class="progress-bar"><span style="width: 85%"></span></div>
                        </div>
                    </div>
                </article>

                <article class="widget widget-feed">
                    <div class="widget-header">
                        <h2>Recent activity</h2>
                        <span>Latest updates</span>
                    </div>
                    <ul class="activity-list">
                        <li><strong>New admin user</strong> created an account.</li>
                        <li><strong>Invoice generated</strong> for order #4529.</li>
                        <li><strong>System check</strong> completed successfully.</li>
                        <li><strong>Email campaign</strong> delivered to 3,200 subscribers.</li>
                    </ul>
                </article>
            </section>
        </main>
    </div>
</body>
</html>
