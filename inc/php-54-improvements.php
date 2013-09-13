<?php

/**
 * Adding PHP 5.4.x specific improvements for the Debug Objects capabilities
 *
 * @since 2.1.16
 * @author nofearinc
 *
 */
class Debug_Objects_Php54 {
	
	/**
	 * Add all required filters/actions
	 */
	public function __construct() {
		add_filter( 'debug_objects_sort_queries', array( $this, 'sort_queries' ), 10, 2 );
	}
	
	/**
	 * Sort queries for the class-query listing if PHP 5.4 is active (using shorthand for arrays)
	 *
	 * @param array $queries WP_Query array
	 * @param int|false $sorting
	 * @return array $queries sorted queries list
	 */
	public function sort_queries( $queries, $sorting ) {
		if ( ! empty( $sorting ) || ! $sorting )
			usort( $queries, Debug_Objects_Query->make_comparer( [1, $sorting] ) );

		return $queries;
	}
}

new Debug_Objects_Php54();