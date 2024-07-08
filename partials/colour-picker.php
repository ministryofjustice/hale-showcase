<?php
// Form options
$colour_choice_text = __("Example colour scheme ", 'hale'); //will be followed by number
$colour_options_count = 4; //how many options to give
?>

<div class="showcase-top-colour-changer">
  <div class="govuk-width-container govuk-!-margin-bottom-0">
    <details class="govuk-details govuk-!-margin-bottom-0">
      <summary class="govuk-details__summary">
        <span class="govuk-details__summary-text">
          Expore colour options
        </span>
      </summary>
      <div class="govuk-details__text">
        <form action="." method="post" novalidate>
          <div class="govuk-form-group">
            <fieldset id="colour-picker-top-form" class="govuk-fieldset govuk-!-margin-bottom-7">
              <legend class="govuk-fieldset__legend govuk-fieldset__legend--m">
                <h2 class="govuk-fieldset__heading">
                  Choose an example colour scheme
                </h2>
              </legend>
              <div class="govuk-radios" data-module="govuk-radios">
                <div class="govuk-radios__item">
                  <input class="govuk-radios__input" id="colour-0" name="colour" type="radio" value="0" checked  onclick='changeColour("0",<?php echo $colour_options_count; ?>);'>
                  <label class="govuk-label govuk-radios__label" for="colour">
                    Remove example colour scheme
                  </label>
                </div>
                <?php
                  for ($i=1;$i<=$colour_options_count;$i++) {
                    echo "
                    <div class='govuk-radios__item'>
                      <input class='govuk-radios__input showcase-colour-option' id='colour-$i' name='colour' type='radio' value='$i' onclick='changeColour($i,$colour_options_count);' >
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
          </div>
        </form>
      </div>
    </details>
  </div>
</div>