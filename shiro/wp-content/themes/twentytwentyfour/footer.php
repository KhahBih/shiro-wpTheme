		</div><!-- END container-->
	</div><!-- END wrapper -->	
</div><!-- END #page -->
<?php wp_footer(); ?>
<?php $menu_slug = get_menu_slug('Empty Menu');

if ($menu_slug) {
    echo 'Slug của menu là: ' . $menu_slug;
} else {
    echo 'Không tìm thấy menu.';
}?>
</body>
</html>