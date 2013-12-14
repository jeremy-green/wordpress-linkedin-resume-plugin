<?php
class View {

	/**
	 * Render a Template
	 */
	public static function render( $filePath, $viewData = null ) {

		// Was any data sent through?
		( $viewData ) ? extract( $viewData ) : null;

		ob_start();
		include ( $filePath );
		$template = ob_get_contents();
		ob_end_clean();

		echo $template;
	}
}