<?php

/**
 * Template Name: Choices
 *
 * @package Hale
 * @copyright Ministry of Justice
 * @version 2.0
 */

$selected_colour_scheme = "";

if (isset($_POST)) {
	if (isset($_POST["cookie"]) && $_POST["cookie"]=="cookie") {
		$cookie="approved";
	} elseif ($_POST["button"] == "submit") {
		$cookie="not approved";
		// delete the cookie
		setcookie("ExampleColour", "", time() - 3600);
	} elseif (isset($_COOKIE["ExampleColour"])) {
		$cookie="exists";
		$selected_colour_scheme = $_COOKIE["ExampleColour"];
	}

	if (isset($_POST["colour"])) {
		$selected_colour_scheme = $_POST["colour"];
		if ($cookie == "approved") {
			setcookie(
				"ExampleColour",
				$selected_colour_scheme,
				0, //expiry, 0=when browser closes
				"/"
			);
		}
	}
}

$colourClass = $selected_colour_scheme;

// Form options
$colour_choice_text = __("Example colour scheme ", 'hale'); //will be followed by number
$colour_options_count = 4; //how many options to give

$is_cat_page = false;

get_header(null, ["header_colour_class" => $colourClass]);

flush();

while (have_posts()) :
		the_post();
		?>

<div id="primary" class="govuk-grid-column-two-thirds">
	<h1 class="govuk-heading-l">
		<?php the_title(); ?>
	</h1>
	<form action="." method="post" novalidate>
		<div class="govuk-form-group">
			<fieldset class="govuk-fieldset govuk-!-margin-bottom-7">
				<legend class="govuk-fieldset__legend govuk-fieldset__legend--m">
					<h2 class="govuk-fieldset__heading">
						Choose an example colour scheme
					</h2>
				</legend>
				<div class="govuk-radios" data-module="govuk-radios">
					<?php
						if ($selected_colour_scheme) {
						// if a colour has been selected, we give the option to deselect it
					?>
					<div class="govuk-radios__item">
						<input class="govuk-radios__input" id="colour-0" name="colour" type="radio" value="">
						<label class="govuk-label govuk-radios__label" for="colour">
							Remove example colour scheme
						</label>
					</div>
					<?php
						}
						for ($i=1;$i<=$colour_options_count;$i++) {
							$selected = "";
							if ($selected_colour_scheme == "colour-$i") $selected = "checked";
							echo "
							<div class='govuk-radios__item'>
								<input class='govuk-radios__input' id='colour-$i' name='colour' type='radio' value='colour-$i' $selected>
								<label class='govuk-label govuk-radios__label' for='colour'>
									$colour_choice_text $i
									<span class='showcase-example-colour-preview showcase-example-colour-preview--$i'>
										<span> </span><span> </span><span> </span>
									</span>
								</label>
							</div>";
						}
					?>
				</div>
			</fieldset>
			<fieldset class="govuk-fieldset" aria-describedby="cookie-hint">
				<legend class="govuk-fieldset__legend govuk-fieldset__legend--m">
					<h2 class="govuk-fieldset__heading">
						Do you want to see this scheme on other pages?
					</h2>
				</legend>
				<div id="cookie-hint" class="govuk-hint">
					This requires a cookie to be set, which will be deleted when the browser is closed.
				</div>
				<div class="govuk-checkboxes" data-module="govuk-checkboxes">
					<div class="govuk-checkboxes__item">
						<input class="govuk-checkboxes__input" id="cookie" name="cookie" type="checkbox" value="cookie" <?php if($cookie=="approved"||$cookie=="exists") echo "checked";?>>
						<label class="govuk-label govuk-checkboxes__label" for="cookie">
							Use a cookie to remember this colour option on other pages on this website.  
						</label>
					</div>
				</div>
			</fieldset>
		</div>
		<button id="button" name="button" type="submit" class="govuk-button" data-module="govuk-button" value="submit">
			Preview
		</button>
	</form>
</div><!-- #primary -->
<?php endwhile;

flush();

get_footer();
