<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<footer class="satu-footer">
    <div class="satu-footer-top">

        <!-- ── Col 1: Logo ── -->
        <div class="satu-footer-brand">
            <a href="/">
                <img src="/wp-content/uploads/2026/05/satu_logo.png" alt="SATU Presidents Forum">
            </a>
            <p>Presidents' Forum of Southeast and South Asia and Taiwan Universities</p>
            <span>IIT BOMBAY</span>
        </div>

        <!-- ── Col 2: Quick Links ──
             HOW TO ADD A LINK: copy any <li><a> line and paste below
             HOW TO REMOVE A LINK: delete the <li>...</li> line
             HOW TO REORDER: cut and paste <li> blocks in desired order
        -->
        <div class="satu-footer-col">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="/about-satu/">About SATU</a></li>
                <li><a href="/constitution/">Constitution</a></li>
                <li><a href="/members/">Members</a></li>
                <li><a href="/steering-committee/">Steering Committee</a></li>
                <li><a href="/general-assembly/">General Assembly</a></li>
                <li><a href="/activities/">Activities</a></li>
                <li><a href="/member-application/">Member Application</a></li>
            </ul>
        </div>

        <!-- ── Col 3: Resources ── -->
        <div class="satu-footer-col">
            <h4>Resources</h4>
            <ul>
                <li><a href="https://www.iitb.ac.in/" target="_blank" rel="noopener">IIT Bombay</a></li>
                <li><a href="https://www.ir.iitb.ac.in/" target="_blank" rel="noopener">Dean IR, IIT Bombay</a></li>
                <li><a href="https://satu.ncku.edu.tw/" target="_blank" rel="noopener">Old SATU Website</a></li>
            </ul>
        </div>

        <!-- ── Col 4: Account ── -->
	<div class="satu-footer-col">
    		<h4>Account</h4>
    		<ul>
        	<?php if ( is_user_logged_in() ) : ?>
            		<li><a href="<?php echo esc_url( wp_logout_url( home_url() ) ); ?>">Log Out</a></li>
        	<?php else : ?>
            		<li><a href="<?php echo esc_url( wp_login_url() ); ?>">Log In</a></li>
        	<?php endif; ?>
    		</ul>
	</div>

    </div>

    <!-- ── Bottom Bar ── -->
    <div class="satu-footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> SATU Presidents' Forum, IIT Bombay. All rights reserved.</p>
    </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
