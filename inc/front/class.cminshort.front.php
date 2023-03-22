<?php
/**
 * CMINSHORT_Front Class
 *
 * Handles the Frontend functionality.
 *
 * @package WordPress
 * @subpackage Plugin name
 * @since 1.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'CMINSHORT_Front' ) ) {

	/**
	 * The CMINSHORT_Front Class
	 */
	class CMINSHORT_Front {

		var $action = null,
		    $filter = null;

		function __construct() {
			add_shortcode( 'cm_in_convert_shortcode', array( $this, 'fn_cm_in_convert_shortcode' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'action__wp_enqueue_scripts' ) );
		}

		function fn_cm_in_convert_shortcode(){
			ob_start();?>
			<div id="righello" class="righello" align="left">
				<div id="al" class="empty"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">⬇ Specify the screen dimension to calibrate the ruler online.</font></font></div>
				<div style="font-size:12pt;position:absolute;bottom:0;right:0;margin-bottom:3px;margin-right:3px;padding:0;"><input id="in" type="radio" value="in" name="rad" checked="" onclick="calc()"><label for="in"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">in</font></font></label><input id="cm" type="radio" value="cm" name="rad" onclick="calc()"><label for="cm"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">cm</font></font></label></div>
				<div class="calibration">
					<select id="sel" onfocus="this.style.outline = '5px auto -webkit-focus-ring-color';" onblur="this.style.outline = 'none';" style="position: absolute; bottom: 1px; left: 1px; width: 110px; height: 25px; line-height: 20px; margin: 0px; padding: 0px; outline: none;" onchange="displayValue.className = 'spinnerson'; document.getElementById('type_set').value = 'sel'; document.getElementById('displayValue').value=this.options[this.selectedIndex].value; document.getElementById('idValue').value=this.options[this.selectedIndex].value; if(this.options[this.selectedIndex].id== 'n'){idValue.value = (Math.sqrt(screen.width*screen.width + screen.height*screen.height)/96).toFixed(1); displayValue.placeholder = '~' + (Math.sqrt(screen.width*screen.width + screen.height*screen.height)/96).toFixed(1); idValue.value = Math.sqrt(screen.width*screen.width + screen.height*screen.height)/96; displayValue.focus(); displayValue.className = 'spinnersoff'; n.innerHTML = '~' + (Math.sqrt(screen.width*screen.width + screen.height*screen.height)/96).toFixed(1) + '″';}; if(this.options[this.selectedIndex].id != 'n'){n.innerHTML = '↶';}; calc();">
						<option id="n" style="color:grey;" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></option>
						<optgroup class="opt1" label="▨ Pequeña">
						<option value="4.0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">4.0″</font></font></option>
						<option value="4.3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">4.3″</font></font></option>
						<option value="4.5"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">4.5″</font></font></option>
						<option value="4.7"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">4.7″</font></font></option>
						<option value="5.0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5.0″</font></font></option>
						<option value="5.1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5.1″</font></font></option>
						<option value="5.2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5.2″</font></font></option>
						<option value="5.5"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5.5″</font></font></option>
						<option value="5.7"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5.7″</font></font></option>
						<option value="6.0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">6.0″</font></font></option>
						</optgroup>
						<optgroup class="opt2" label="▨ Mediana">
						<option value="6.2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">6.2″</font></font></option>
						<option value="7.0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">7.0″</font></font></option>
						<option value="8.0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">8.0″</font></font></option>
						<option value="9.7"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">9.7″</font></font></option>
						<option value="10.1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">10.1″</font></font></option>
						</optgroup>
						<optgroup class="opt3" label="▨ Grande">
						<option value="11.6"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">11.6″</font></font></option>
						<option value="13.3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">13.3″</font></font></option>
						<option value="15.6"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">15.6″</font></font></option>
						<option value="17.3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">17.3″</font></font></option>
						<option value="18.5"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">18.5″</font></font></option>
						<option value="21.5"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">21.5″</font></font></option>
						<option value="24.0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">24.0″</font></font></option>
						<option value="27.0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">27.0″</font></font></option>
						</optgroup>
					</select>
					<input type="hidden" value="sel" name="type_set" id="type_set">
					<input type="number" autofocus="" step="0.1" min="2.5" max="50" placeholder="Diagonal ″" name="displayValue" id="displayValue" class="spinnersoff" onblur="sel.style.outline = 'none';" onpaste="if(!isNaN((event.clipboardData) ? event.clipboardData.getData('Text') : window.clipboardData.getData('Text'))) {this.className = 'spinnerson' &amp;&amp; w.removeAttribute('disabled');}" onkeyup="if (event.keyCode >= 48 &amp;&amp; event.keyCode <= 57) {this.className = 'spinnerson' &amp;&amp; w.removeAttribute('disabled');}" onkeydown="if (event.keyCode == 8 || event.keyCode == 46) {this.className = 'spinnerson' &amp;&amp; w.removeAttribute('disabled');}" onchange="idValue.value=this.value; document.getElementById('type_set').value = 'text'; calc();" oninput="if(this.value == ''){this.className = 'spinnersoff';this.placeholder = 'Diagonale ″';}" style="padding-left:2px;position:absolute;bottom:2px;left:2px;width:89px;width:82px\9;#width:82px;height:21px; height:28px\9;#height:18px;border:0px;border-right-style:none;" onfocus="this.select(); sel.style.outline = '5px auto -webkit-focus-ring-color';"> <button id="w" style="margin-left:115px;font-size:11pt;margin-bottom:1px;outline:0;height:25px;" type="button" title="calibrate" onclick="calc()"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">↹ Calibrate</font></font></button>
					<input name="idValue" id="idValue" type="hidden" onkeyup="c()" onchange="calc()"><input type="hidden" id="result" name="result" readonly="" value="">
				</div>
			</div>
			<?php
			return ob_get_clean();
		}

		function action__wp_enqueue_scripts(){
			wp_enqueue_script( CMINSHORT_PREFIX . '_front_js', CMINSHORT_URL . 'assets/js/front.js', array( 'jquery-core' ),'' );
			$plugin_local = array(
				'image_url' => CMINSHORT_URL
			);
			wp_localize_script( CMINSHORT_PREFIX . '_front_js', 'plugin_local_data', $plugin_local );
			wp_enqueue_style( CMINSHORT_PREFIX . '_front_css', CMINSHORT_URL . 'assets/css/front.css' );
		}
	}

	add_action( 'plugins_loaded', function() {
		CMINSHORT()->front = new CMINSHORT_Front;
	} );
}
