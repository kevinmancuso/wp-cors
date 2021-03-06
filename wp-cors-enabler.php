function initCors( $value ) {
	$origin = get_http_origin();
	// Add Urls to allow.
	$allowed_origins = [ 'test1.com', 'test2.com', 'localhost:3000' ];
	if ( $origin && in_array( $origin, $allowed_origins ) ) {
		header( 'Access-Control-Allow-Origin: ' . esc_url_raw( $origin ) );
		header( 'Access-Control-Allow-Methods: GET' );
		header( 'Access-Control-Allow-Credentials: true' );
	}
	return $value;
}

// InitCors
add_action( 'rest_api_init', function() {
	remove_filter( 'rest_pre_serve_request', 'rest_send_cors_headers' );
	add_filter( 'rest_pre_serve_request', initCors);
}, 15 );
