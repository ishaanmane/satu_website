<?php
if ( ! defined( 'ABSPATH' ) ) exit;

$viewport_content = apply_filters( 'hello_elementor_viewport_content', 'width=device-width, initial-scale=1' );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="<?php echo esc_attr( $viewport_content ); ?>">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="satu-header">
    <a href="https://www.ir.iitb.ac.in/" target="_blank">
        <div class="satu-logo-left">
            <img src="/wp-content/uploads/2026/05/itb-ir-logo-new.png" alt="IIT Bombay International Relations">
        </div>
    </a>

    <div class="satu-logo-center">
        <a href="/">
            <img src="/wp-content/uploads/2026/05/satu_logo.png" alt="SATU Presidents Forum">
        </a>
    </div>

    <div class="satu-header-right satu-desktop-only">
    	<?php if ( is_user_logged_in() ) : ?>
        	<a href="<?php echo esc_url( wp_logout_url( home_url() ) ); ?>" class="satu-login-btn">Logout</a>
    	<?php else : ?>
        	<a href="<?php echo esc_url( wp_login_url() ); ?>" class="satu-login-btn">Login</a>
    <?php endif; ?>
    </div>
</header>

<!--
=============================================================
SATU NAVIGATION BAR
=============================================================

HOW TO ADD A PLAIN TAB:
<li><a href="/your-page/">Tab Name</a></li>

HOW TO DELETE A TAB:
Delete the entire <li>...</li> block for that tab.

HOW TO ADD A TAB WITH DROPDOWN:
<li class="satu-has-dropdown">
    <a href="#">Parent Tab</a>
    <ul class="satu-dropdown">
        <li><a href="/child-page-1/">Child Page 1</a></li>
        <li><a href="/child-page-2/">Child Page 2</a></li>
    </ul>
</li>

HOW TO REORDER TABS:
Cut and paste the <li>...</li> blocks in the order you want.

NOTE: On mobile, all tabs collapse into a hamburger menu.
Dropdown tabs become tappable toggles on mobile.
=============================================================
-->

<nav class="satu-nav">
    <button class="satu-hamburger" aria-label="Toggle menu" onclick="satuMobileMenu()">
        <span></span><span></span><span></span>
    </button>
    <ul class="satu-nav-list" id="satuNavList">

        <!-- ── Plain tab template: copy this for any new plain tab ── -->
        <li><a href="/">Home</a></li>
        <li><a href="/about-satu/">About SATU</a></li>
        <li><a href="/constitution/">Constitution</a></li>
        <li><a href="/members/">Members</a></li>
        <li><a href="/steering-committee/">Steering Committee</a></li>
        <li><a href="/general-assembly/">General Assembly</a></li>
        <li><a href="/activities/">Activities</a></li>
        <li><a href="/member-application/">Member Application</a></li>

        <!--
        ── Dropdown tab template (commented out — uncomment and edit to use) ──
        <li class="satu-has-dropdown">
            <a href="#">Parent Tab ▾</a>
            <ul class="satu-dropdown">
                <li><a href="/child-page-1/">Child Page 1</a></li>
                <li><a href="/child-page-2/">Child Page 2</a></li>
                <li><a href="/child-page-3/">Child Page 3</a></li>
            </ul>
        </li>
        -->

    </ul>
</nav>

<script>
function satuMobileMenu() {
    var nav   = document.getElementById('satuNavList');
    var btn   = document.querySelector('.satu-hamburger');
    var open  = nav.classList.toggle('open');
    var spans = btn.querySelectorAll('span');
    if (open) {
        spans[0].style.transform = 'translateY(7px) rotate(45deg)';
        spans[1].style.opacity   = '0';
        spans[2].style.transform = 'translateY(-7px) rotate(-45deg)';
    } else {
        spans[0].style.transform = spans[2].style.transform = '';
        spans[1].style.opacity   = '';
        document.querySelectorAll('.satu-has-dropdown.open')
            .forEach(function(el){ el.classList.remove('open'); });
    }
}

document.addEventListener('DOMContentLoaded', function () {

    // ── Active link highlight ──
    document.querySelectorAll('.satu-nav-list > li > a')
        .forEach(function(link) {
            var href = link.getAttribute('href');
            if (href === '/' && window.location.pathname === '/') {
                link.classList.add('active');
            } else if (href !== '/' && window.location.pathname.startsWith(href)) {
                link.classList.add('active');
            }
        });

    // ── Mobile dropdown toggles ──
    document.querySelectorAll('.satu-has-dropdown > a')
        .forEach(function(link) {
            link.addEventListener('click', function(e) {
                if (window.innerWidth <= 900) {
                    e.preventDefault();
                    var parent = this.closest('.satu-has-dropdown');
                    var wasOpen = parent.classList.contains('open');
                    document.querySelectorAll('.satu-has-dropdown')
                        .forEach(function(el){ el.classList.remove('open'); });
                    if (!wasOpen) parent.classList.add('open');
                }
            });
        });

    // ── Close menu on outside click ──
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.satu-nav')) {
            document.querySelectorAll('.satu-has-dropdown.open')
                .forEach(function(el){ el.classList.remove('open'); });
        }
    });
});
</script>
