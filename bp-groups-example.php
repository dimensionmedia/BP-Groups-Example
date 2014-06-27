<?php


if ( class_exists( 'BP_Group_Extension' ) ) :
  
class BP_Example_Group_Extension_API extends BP_Group_Extension {
    /**
     * Here you can see more customization of the config options
     */
    function __construct() {
        $args = array(
            'slug' => 'project-details',
            'name' => 'Project Details',
            'nav_item_position' => 105,
            'screens' => array(
                'edit' => array(
                    'name' => 'Project Details',
                    'submit_text' => 'Update',
                ),
                'create' => array(
                    'position' => 100,
                ),
            ),
        );
        parent::init( $args );
    }
 
    function display() {
    
    	$group_id = bp_get_group_id();
    
        $pledge_goal = groups_get_groupmeta( $group_id, 'bpgex_pledge_goal' );
        $pledge_amount = groups_get_groupmeta( $group_id, 'bpgex_pledge_amount' );
        $goal_date_ending = groups_get_groupmeta( $group_id, 'bpgex_pledge_goal_date_ending' );
		
		echo '<div><strong>Pledge Goal:</strong> ' . $pledge_goal . ' </div>';
		
		echo '<div><strong>Pledge Amount:</strong> ' . $pledge_amount . ' </div>';
		
		echo '<div><strong>Goal Date Ending:</strong> ' . $goal_date_ending . ' </div>'; // this could easily be days left with a little PHP date calculation
    
    }
 
    function settings_screen( $group_id ) {
    
        $pledge_goal = groups_get_groupmeta( $group_id, 'bpgex_pledge_goal' );
        $pledge_amount = groups_get_groupmeta( $group_id, 'bpgex_pledge_amount' );
        $goal_date_ending = groups_get_groupmeta( $group_id, 'bpgex_pledge_goal_date_ending' );
 
        ?>
        <div>Pledge Goal: <input type="text" name="bpgex_pledge_goal" value="<?php echo esc_attr( $pledge_goal ) ?>" /></div>
        
        <div>Pledge Amount: <input type="text" name="bpgex_pledge_amount" value="<?php echo esc_attr( $pledge_amount ) ?>" /></div>
        
        <div>Date Ending: <input type="text" name="bpgex_pledge_goal_date_ending" value="<?php echo esc_attr( $goal_date_ending ) ?>" /></div>
        
        <?php
    }
 
    function settings_screen_save( $group_id ) {
    
        $pledge_goal = isset( $_POST['bpgex_pledge_goal'] ) ? $_POST['bpgex_pledge_goal'] : '';
        $pledge_amount = isset( $_POST['bpgex_pledge_amount'] ) ? $_POST['bpgex_pledge_amount'] : '';
        $goal_date_ending = isset( $_POST['bpgex_pledge_goal_date_ending'] ) ? $_POST['bpgex_pledge_goal_date_ending'] : '';
        
        groups_update_groupmeta( $group_id, 'bpgex_pledge_goal', $pledge_goal );
        groups_update_groupmeta( $group_id, 'bpgex_pledge_amount', $pledge_amount );
        groups_update_groupmeta( $group_id, 'bpgex_pledge_goal_date_ending', $goal_date_ending );
        
    }
 
    /**
     * create_screen() is an optional method that, when present, will
     * be used instead of settings_screen() in the context of group
     * creation.
     *
     * Similar overrides exist via the following methods:
     *   * create_screen_save()
     *   * edit_screen()
     *   * edit_screen_save()
     *   * admin_screen()
     *   * admin_screen_save()
     */
    function create_screen( $group_id ) {
        $setting = groups_get_groupmeta( $group_id, 'group_extension_example_2_setting' );
 
        ?>
        Welcome to your new group! You are neat.
        Save your plugin setting here: <input type="text" name="group_extension_example_2_setting" value="<?php echo esc_attr( $setting ) ?>" />
        <?php
    }
 
}

bp_register_group_extension( 'BP_Example_Group_Extension_API' );
 
endif;

?>