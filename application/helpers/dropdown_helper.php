<?php
/**
 * Author: Brendan
 * Date: 8/11/12
 */

  /**
   * build_dropdown()
   *
   * Builds a select/options dropdown.
   *
   * method uses:	( method: build_option(); )
   *
   * @access	      public
   * @param	string	- the select id
   * @param	string	- the select css class values
   * @param	string	- the select name
   * @param	object	- the database object
   * @param	string	- the selected option value
   * @param	string	- the onchanged method
   * @return	string	- the output string
   */

  if ( ! function_exists('build_dropdown'))
  {
    //                       id        class     name   array      selected         onchange
    function build_dropdown($id = '', $classes, $name, $dropdown, $selected_value, $onchange_method = '')
    {
      $output  = "<select id='$id' class='$classes' name='$name' onchange='$onchange_method'>\n";
      //$output .= build_option('Select', '', $selected_value);

      foreach ($dropdown as $key => $text)
      {
        $output .= build_option($key, $text, $selected_value);
      }

      $output .= "</select>\n";

      return ($output);
    }
  }

// --------------------------------------------------------------------

  /**
   * build_option()
   *
   * Builds the option values for the dropdown select.
   *
   * called from:	( build_dropdown(); )
   *
   * @access	public
   * @param	string	- the text to display
   * @param	string	- the option value
   * @param	string	- the option select compare value
   * @return	string	- the output string
   */
  if ( ! function_exists('build_option'))
  {
    function build_option($key, $text, $selected_cmp)
    {
      $output = "<option value=\"" . $key . "\"";

      if ($key == $selected_cmp)
      {
        $output .= " selected";
      }

      $output .= ">" . $text . "</option>\n";

      return ($output);
    }
  }
