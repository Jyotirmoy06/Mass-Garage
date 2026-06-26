<div id="bv-mboxzone-lightbox" class="bv-mboxzone bv-cleanslate bv-cv2-cleanslate bv-mbox-lightbox bv-mbox-opened noshow" style="height: auto !important;">
    <div class="bv-mbox-inner bv-core-container-146 bv-mbox-lightbox">
        <div class="bv-mbox-wrapper bv-mbox-content-submission-review bv-mbox-wide bv-mbox-box">
            <div id="bv-mbox-lightbox-list" class="bv-mbox" role="dialog" aria-modal="true" aria-label="<?php $product_Title ?>"> <button onclick="hidelightbox()" type="button" name="Cancel" class="bv-mbox-close bv-focusable" tabindex="0" aria-labelledby="bv-mbox-close-label bv-mbox-breadcrumb-item"> <span aria-hidden="true"> ✘ </span> <span id="bv-mbox-close-label" class="bv-off-screen">Close</span> </button>                <span data-bv-mbox-layer-index="" class="bv-mbox-breadcrumb-item-tc" id="bv-mbox-breadcrumb-item-tc">Close Terms and Conditions</span>
                <div class="bv-mbox-sidebar bv-sidebar-enabled">
                    <div data-bv-v="submissionSidebar:4" class="bv-submission-sidebar bv-submission-side">
                        <div class="bv-subject-info-section">
                            <div class="bv-subject-info"> <img class="bv-subject-image" src="<?php echo $images[0] ?>" alt="<?php echo $product_Title ?>"> <span class="bv-subject-name-header"> <?php echo $product_Title ?> </span> </div>
                        </div>
                    </div>
                </div>
                <div class="bv-mbox-content-container">
                    <h2 class="bv-mbox-breadcrumb"> <span data-bv-mbox-layer-index="0" class="bv-mbox-breadcrumb-item" id="bv-mbox-breadcrumb-item"> <span>My Review for <?php echo $product_Title ?></span> </span>
                    </h2>
                    <div class="bv-mbox-injection-container" style="height: 1220.1px !important;">
                        <div class="bv-mbox-injection-target bv-mbox-current">
                            <div data-bv-v="submission:1" class="bv-submission bv-submission-image">
                                <div class="bv-compat">
                                    <form  action="/includes/review.form.inc.php" enctype="multipart/form-data" method="POST" class="bv-form" id="review_form">
                                        <input type="hidden" name="productid" value="<?= $product_id ?>" class="bv-noremember">
                                        <input type="hidden" name="product" value="<?= $product_Title ?>" class="bv-noremember">
                                        <div class="bv-submission-section">
                                            <span id="bv-required-text">
                                                <p class="bv-required-fields-text">Required fields are marked with *</p>
                                                <span class="bv-off-screen" aria-hidden="false">Use arrow keys to select the rating.</span>
                                            </span>
                                            <span class="bv-off-screen" id="bv-required-text-reader">Required field</span>
                                            <div class="bv-fieldsets bv-input-fieldsets">
                                                <fieldset class="bv-fieldset bv-fieldset-rating bv-radio-field bv-fieldset-active bv-error">
                                                    <div class="bv-fieldset-label-wrapper" id="bv-fieldset-label-rating">
                                                        <span class="bv-fieldset-label">
                                                            <span class="bv-fieldset-label-text" id="bv-fieldset-label-text-rating"> Overall Rating* </span>
                                                            <span aria-hidden="false" class="bv-off-screen bv-field-aria-validation" id="bv-field-aria-validation-rating">Error: Required.Overall Rating</span>
                                                        </span>
                                                    </div>
<!--                                                    <span class="bv-helper">-->
<!--                                                        <span class="bv-helper-label">Required:Overall Rating</span>-->
<!--                                                        <span class="bv-helper-icon" aria-hidden="true">-->
<!--                                                            <span class="bv-helper-icon-positive"> ✔ </span>-->
<!--                                                            <span class="bv-helper-icon-negative"> ✘ </span>-->
<!--                                                        </span>-->
<!--                                                    </span>-->
                                                    <span class="bv-fieldset-arrowicon"></span>
                                                    <span class="bv-fieldset-inner">
                                                        <span class="bv-fieldset-rating-wrapper bv-fieldset-radio-wrapper" role="radiogroup" aria-labelledby="bv-required-text">
                                                            <span class="bv-fieldset-rating-group bv-radio-group notranslate">
                                                            <!--   Hidden Input for rating value starts -->
                                                                <input type="hidden" value="" name="overall" id="overall_rating" required style="display: none !important;"/>
                                                                <!--   Hidden Input for rating value ends -->
                                                     <span class="bv-submission-star-rating-control">
                                                         <span onclick="ratings('overall', 1)" class="bv-submission-star-rating bv-submission-rater-0 bv-radio-input bv-rating-input bv-required bv-submission-star-rating-applied bv-submission-star-rating-live">
                                                             <span class="bv-rating-link overall_rating bv-focusable bv-radio-rating-overall-1" aria-labelledby="bv-fieldset-label-text-rating bv-off-screen-rating-Poor bv-field-aria-validation-rating" id="bv-radio-rating-1" role="radio" type="radio" aria-checked="false" tabindex="0"> <span aria-hidden="true">★</span>                                                    <span class="bv-off-screen" id="bv-off-screen-rating-Poor">1 star. Poor.</span> </span>
                                                    </span> <span onclick="ratings('overall', 2)" class="bv-submission-star-rating bv-submission-rater-0 bv-radio-input bv-rating-input bv-required bv-submission-star-rating-applied bv-submission-star-rating-live"> <span class="bv-rating-link overall_rating bv-focusable bv-radio-rating-overall-2" aria-labelledby="bv-fieldset-label-text-rating bv-off-screen-rating-Fair bv-field-aria-validation-rating" id="bv-radio-rating-2" role="radio" type="radio" aria-checked="false" tabindex="0"> <span aria-hidden="true">★</span>                                                    <span class="bv-off-screen" id="bv-off-screen-rating-Fair">2 stars. Fair.</span> </span>
                                                    </span> <span onclick="ratings('overall', 3)" class="bv-submission-star-rating bv-submission-rater-0 bv-radio-input bv-rating-input bv-required bv-submission-star-rating-applied bv-submission-star-rating-live"> <span class="bv-rating-link overall_rating bv-focusable bv-radio-rating-overall-3" aria-labelledby="bv-fieldset-label-text-rating bv-off-screen-rating-Average bv-field-aria-validation-rating" id="bv-radio-rating-3" role="radio" type="radio" aria-checked="false" tabindex="0"> <span aria-hidden="true">★</span>                                                    <span class="bv-off-screen" id="bv-off-screen-rating-Average">3 stars. Average.</span> </span>
                                                    </span> <span onclick="ratings('overall', 4)" class="bv-submission-star-rating bv-submission-rater-0 bv-radio-input bv-rating-input bv-required bv-submission-star-rating-applied bv-submission-star-rating-live"> <span class="bv-rating-link overall_rating bv-focusable bv-radio-rating-overall-4" aria-labelledby="bv-fieldset-label-text-rating bv-off-screen-rating-Good bv-field-aria-validation-rating" id="bv-radio-rating-4" role="radio" type="radio" aria-checked="false" tabindex="0"> <span aria-hidden="true">★</span>                                                    <span class="bv-off-screen" id="bv-off-screen-rating-Good">4 stars. Good.</span> </span>
                                                    </span> <span onclick="ratings('overall', 5)" class="bv-submission-star-rating bv-submission-rater-0 bv-radio-input bv-rating-input bv-required bv-submission-star-rating-applied bv-submission-star-rating-live"> <span class="bv-rating-link overall_rating bv-focusable bv-radio-rating-overall-5" aria-labelledby="bv-fieldset-label-text-rating bv-off-screen-rating-Excellent bv-field-aria-validation-rating" id="bv-radio-rating-5" role="radio" type="radio" aria-checked="false" tabindex="0"> <span aria-hidden="true">★</span>                                                    <span class="bv-off-screen" id="bv-off-screen-rating-Excellent">5 stars. Excellent.</span> </span>
                                                    </span>
                                                    </span>
                                                    </span>
                                                            <span class="bv-rating-helper bv-rating-helper-overall-1" aria-hidden="true">
                                                                Click to rate!
                                                                <!-- Input Error Starts -->
                                                                <span class="overall-error" style="display: none !important;">
                                                                    <small class="input-error" style="color: red !important; font-weight: bolder !important; font-size: 12px !important;">Please rate this product</small>
                                                                </span>
                                                                <!-- Input Error Ends -->
                                                            </span> </span>
                                                    </span>
                                                </fieldset>
                                                <fieldset class="bv-fieldset bv-fieldset-title bv-text-field bv-nocount">
                                                    <div class="bv-fieldset-arrowicon"></div>
                                                    <div class="bv-fieldset-inner"> <label for="bv-text-field-title" class="bv-fieldset-label-wrapper"> <span class="bv-fieldset-label"> <span class="bv-fieldset-label-text"> Review Title* </span> <span aria-hidden="false" class="bv-off-screen bv-field-aria-validation"></span> </span> <span class="bv-off-screen">Maximum of 50 characters.</span> </label>                                                        <span class="bv-helper"> <span class="bv-helper-label"></span> <span class="bv-helper-icon" aria-hidden="true"> <span class="bv-helper-icon-positive"> ✔ </span> <span class="bv-helper-icon-negative"> ✘ </span>                                                        </span>
                                                        </span> <input id="bv-text-field-title" class="bv-text bv-focusable review_title" type="text" name="title" maxlength="50" placeholder="Give your review a title." value="" required="" aria-required="true"
                                                                       tabindex="0">
                                                    <br/>
                                                    <!-- Input Error Starts -->
                                                    <div class="title-error" style="display: none !important;">
                                                        <small class="input-error" style="color: red !important; font-weight: bolder !important; font-size: 12px !important;">Please fill in a review title</small>
                                                    </div>
                                                    <!-- Input Error Ends -->
                                                    </div>
                                                </fieldset>
                                                <fieldset class="bv-fieldset bv-fieldset-reviewtext bv-textarea-field bv-nocount">
                                                    <div class="bv-fieldset-arrowicon"></div>
                                                    <div class="bv-fieldset-inner"> <label for="bv-textarea-field-reviewtext" class="bv-fieldset-label-wrapper"> <span class="bv-fieldset-label" aria-describedby="reviewtext_validation"> <span class="bv-fieldset-label-text"> Review* </span> <span id="reviewtext_validation" aria-hidden="false" class="bv-off-screen bv-field-aria-validation"></span> </span> </label>                                                        <span class="bv-helper"> <span class="bv-helper-label"></span> <span aria-hidden="false" class="bv-off-screen bv-helper-label-aria" role="status" aria-live="polite"></span> <span class="bv-helper-icon"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        aria-hidden="true"> <span class="bv-helper-icon-positive"> ✔ </span> <span class="bv-helper-icon-negative"> ✘ </span> </span>
                                                        </span>
                                                        <div class="bv-review-field-content-wrapper">
                                                            <textarea id="bv-textarea-field-reviewtext" class="bv-text bv-focusable review_content" name="review" maxlength="10000" placeholder="Helpful reviews talk about use, quality, and effectiveness. Inspire other shoppers by adding photos!" data-bv-dropdown-inmbox="" data-bv-dropdown-style="helperTextOverflow" data-bv-dropdown-always-show="false"  required aria-required="true" tabindex="0" style="overflow-wrap: break-word; overflow: hidden !important; height: 90px !important;"></textarea>
                                                            <div class="bv-review-media bv-thumbnail-strip"></div>
                                                            <div class="bv-review-media">
                                                                <div class="bv-review-media-actions"> 
                                                                    <button type="button" class="bv-content-btn bv-btn-add-photo bv-popup-target bv-focusable" aria-describedby="add-photo-button-description" tabindex="0"> 
                                                                        <label for="image_url">Add Photo</label>
                                                                        <input accept=".jpeg,.png,.bmp,.jpg" type="file" name="image_url" id="image_url" style="display: none !important;">
                                                                    </button>
                                                                    <span id="add-photo-button-description" aria-hidden="true" class="bv-review-photo-actions-label"> Add a photo </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Input Error Starts -->
                                                        <div class="review-error" style="display: none !important;">
                                                            <br/>
                                                            <small class="input-error" style="color: red !important; font-weight: bolder !important; font-size: 12px !important;">Please write a review</small>
                                                        </div>
                                                        <!-- Input Error Ends -->
                                                    </div>
                                                </fieldset>
                                                <fieldset class="bv-fieldset bv-fieldset-isrecommended bv-radio-field bv-nocount">
                                                    <div class="bv-fieldset-label-wrapper" id="bv-fieldset-label-isrecommended"> <span class="bv-fieldset-label"> <span class="bv-fieldset-label-text" id="bv-fieldset-label-text-isrecommended"> Would you recommend this product to a friend? </span> <span aria-hidden="false" class="bv-off-screen bv-field-aria-validation"
                                                                                                                                                                                                                                                                                                              id="bv-field-aria-validation-isrecommended"></span> </span>
                                                    </div><span class="bv-helper"> <span class="bv-helper-label"></span> <span class="bv-helper-icon" aria-hidden="true"> <span class="bv-helper-icon-positive"> ✔ </span> <span class="bv-helper-icon-negative"> ✘ </span>                                                    </span>
                                                    </span> <span class="bv-fieldset-arrowicon"></span>
                                                    <span class="bv-fieldset-inner">
                                                        <span class="bv-fieldset-isrecommended-wrapper bv-fieldset-radio-wrapper" role="radiogroup">
                                                            <span class="bv-fieldset-isrecommended-group bv-radio-group">
                                                                <ul>
                                                                    <li class="bv-radio-isrecommended bv-radio-isrecommended-group-true bv-radio-container-li bv-width-from-rating-stats-50">
                                                                        <label class="bv-radio-wrapper-label " for="bv-radio-isrecommended-true" id="bv-radio-isrecommended-true-label">Yes</label>
                                                                        <input required type="radio" id="bv-radio-isrecommended-true" name="recommend" class="bv-radio-input bv-isrecommended-input bv-focusable" value="yes" data-label="Yes" aria-labelledby="bv-fieldset-label-text-isrecommended bv-radio-isrecommended-true-label bv-field-aria-validation-isrecommended" aria-checked="false" aria-label="Yes" role="radio" tabindex="0">
                                                                    </li>
                                                                    <li class="bv-radio-isrecommended bv-radio-isrecommended-group-false bv-radio-container-li bv-width-from-rating-stats-50">
                                                                        <label class="bv-radio-wrapper-label" for="bv-radio-isrecommended-false" id="bv-radio-isrecommended-false-label">No</label>
                                                                        <input required type="radio" id="bv-radio-isrecommended-false" name="recommend" class="bv-radio-input bv-isrecommended-input bv-focusable" value="no" data-label="No" aria-labelledby="bv-fieldset-label-text-isrecommended bv-radio-isrecommended-false-label bv-field-aria-validation-isrecommended" aria-checked="false" aria-label="No" role="radio" tabindex="0">
                                                                    </li>
                                                                </ul>
                                                            </span>
                                                        </span>
                                                        <!-- Input Error Starts -->
                                                        <div class="recommend-error" style="display: none !important;">
                                                            <br/>
                                                            <small class="input-error" style="color: red !important; font-weight: bolder !important; font-size: 12px !important;">Choose a recommendation option </small>
                                                        </div>
                                                        <!-- Input Error Ends -->
                                                    </span>
                                                </fieldset>
                                                <fieldset class="bv-fieldset bv-fieldset-usernickname bv-text-field bv-nocount bv-fieldset-small">
                                                    <div class="bv-fieldset-arrowicon"></div>
                                                    <div class="bv-fieldset-inner"> <label for="bv-text-field-usernickname" class="bv-fieldset-label-wrapper"> <span class="bv-fieldset-label"> <span class="bv-fieldset-label-text"> Nickname* </span> <span aria-hidden="false" class="bv-off-screen bv-field-aria-validation"></span> </span> <span class="bv-off-screen">Maximum of 25 characters.</span> </label>                                                        <span class="bv-helper"> <span class="bv-helper-label" role="status" aria-live="polite"></span> <span class="bv-helper-icon" aria-hidden="true"> <span class="bv-helper-icon-positive"> ✔ </span>
                                                        <span class="bv-helper-icon-negative "> ✘ </span>
                                                        </span>
                                                        </span>
                                                        <input autocomplete="nickname" id="bv-text-field-usernickname" class="bv-text bv-focusable " type="text" name="name" maxlength="25" placeholder="Example: bob27" value="" required="" aria-required="true"
                                                                           tabindex="0">
                                                        <br/>
                                                        <!-- Input Error Starts -->
                                                        <div class="name-error" style="display: none !important;">
                                                            <small class="input-error" style="color: red !important; font-weight: bolder !important; font-size: 12px !important;">Please fill in your nickname/name</small>
                                                        </div>
                                                        <!-- Input Error Ends -->
                                                    </div>
                                                </fieldset>
                                                <fieldset class="bv-fieldset bv-fieldset-userlocation bv-text-field bv-nocount bv-fieldset-small">
                                                    <div class="bv-fieldset-arrowicon"></div>
                                                    <div class="bv-fieldset-inner"> <label for="bv-text-field-userlocation" class="bv-fieldset-label-wrapper"> <span class="bv-fieldset-label"> <span class="bv-fieldset-label-text"> Location </span> <span aria-hidden="false" class="bv-off-screen bv-field-aria-validation"></span> </span> <span class="bv-off-screen">Maximum of 50 characters.</span> </label>                                                        <span class="bv-helper"> <span class="bv-helper-label"></span> <span class="bv-helper-icon" aria-hidden="true"> <span class="bv-helper-icon-positive"> ✔ </span> <span class="bv-helper-icon-negative"> ✘ </span>                                                        </span>
                                                        </span> <input id="bv-text-field-userlocation" class="bv-text bv-focusable " type="text" name="location" maxlength="50" placeholder="Example: New York, NY" value="" tabindex="0"> </div>
                                                </fieldset>
                                                <fieldset class="bv-fieldset bv-fieldset-hostedauthentication_authenticationemail bv-email-field bv-nocount bv-fieldset-small-alone">
                                                    <div class="bv-fieldset-arrowicon"></div>
                                                    <div class="bv-fieldset-inner"> <label for="bv-email-field-hostedauthentication_authenticationemail" class="bv-fieldset-label-wrapper"> <span class="bv-fieldset-label"> <span class="bv-fieldset-label-text"> Email* </span> <span aria-hidden="false" class="bv-off-screen bv-field-aria-validation"></span> </span> <span class="bv-off-screen">Maximum of 255 characters.</span> </label>                                                        <span class="bv-helper"> <span class="bv-helper-label" id="bv-invalid-email-for-aria-describedby"></span> <span class="bv-helper-icon" aria-hidden="true"> <span class="bv-helper-icon-positive"> ✔ </span>                                                        <span class="bv-helper-icon-negative"> ✘ </span> </span>
                                                        </span>
                                                        <input autocomplete="email" id="bv-email-field-hostedauthentication_authenticationemail" class="bv-text bv-focusable bv-email" type="email" name="email" maxlength="255"
                                                                       placeholder="Example: youremail@example.com" value="" required="" aria-required="true" aria-describedby="bv-invalid-email-for-aria-describedby" tabindex="0">
                                                        <!-- Input Error Starts -->
                                                        <div class="email-error" style="display: none !important;">
                                                            <br/>
                                                            <small class="input-error" style="color: red !important; font-weight: bolder !important; font-size: 12px !important;">Please fill in a valid email address</small>
                                                        </div>
                                                        <!-- Input Error Ends -->
                                                    </div>
                                                </fieldset>
                                                <fieldset class="bv-fieldset bv-fieldset-rating_Quality bv-radio-field bv-fieldset-secondary-rating">
                                                    <div class="bv-fieldset-label-wrapper" id="bv-fieldset-label-rating_Quality">
                                                        <span class="bv-fieldset-label">
                                                            <span class="bv-fieldset-label-text" id="bv-fieldset-label-text-rating_Quality"> Quality </span>
                                                            <span aria-hidden="false" class="bv-off-screen bv-field-aria-validation" id="bv-field-aria-validation-rating_Quality"></span>
                                                        </span>
                                                    </div>
                                                    <span class="bv-helper">
                                                        <span class="bv-helper-label"></span>
                                                        <span class="bv-helper-icon" aria-hidden="true">
                                                            <span class="bv-helper-icon-positive"> ✔ </span>
                                                            <span class="bv-helper-icon-negative"> ✘ </span>
                                                        </span>
                                                    </span>
                                                    <span class="bv-fieldset-arrowicon"></span>
                                                    <span class="bv-fieldset-inner">
                                                        <span class="bv-fieldset-rating_Quality-wrapper bv-fieldset-radio-wrapper" role="radiogroup">
                                                            <span class="bv-fieldset-rating_Quality-group bv-radio-group notranslate">
                                                            <!--   Hidden Input for rating value starts -->
                                                                <input type="hidden" value="" name="quality" id="quality_rating" style="display: none !important;"/>
                                                                <!--   Hidden Input for rating value ends -->
                                                                <span class="bv-submission-star-rating-control">
                                                                    <span onclick="ratings('quality', 1)" class="bv-submission-star-rating bv-submission-rater-0 bv-radio-input bv-rating_Quality-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-submission-star-rating-live">
                                                                        <span class="bv-rating-link quality_rating bv-focusable bv-radio-rating-quality-1" aria-labelledby="bv-fieldset-label-text-rating_Quality bv-off-screen-rating_Quality-Poor bv-field-aria-validation-rating_Quality" id="bv-radio-rating_Quality-1" role="radio" type="radio" aria-checked="false" tabindex="0">
                                                                            <span aria-hidden="true">★</span>
                                                                            <span class="bv-off-screen" id="bv-off-screen-rating_Quality-Poor">1 star. Poor.</span>
                                                                        </span>
                                                                    </span>
                                                                    <span onclick="ratings('quality', 2)" class="bv-submission-star-rating bv-submission-rater-0 bv-radio-input bv-rating_Quality-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-submission-star-rating-live">
                                                                        <span class="bv-rating-link quality_rating bv-focusable bv-radio-rating-quality-2" aria-labelledby="bv-fieldset-label-text-rating_Quality bv-off-screen-rating_Quality-Fair bv-field-aria-validation-rating_Quality" id="bv-radio-rating_Quality-2" role="radio" type="radio" aria-checked="false" tabindex="0">
                                                                            <span aria-hidden="true">★</span>
                                                                            <span class="bv-off-screen" id="bv-off-screen-rating_Quality-Fair">2 stars. Fair.</span>
                                                                        </span>
                                                                    </span>
                                                                    <span onclick="ratings('quality', 3)" class="bv-submission-star-rating bv-submission-rater-0 bv-radio-input bv-rating_Quality-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-submission-star-rating-live">
                                                                        <span class="bv-rating-link quality_rating bv-focusable bv-radio-rating-quality-3" aria-labelledby="bv-fieldset-label-text-rating_Quality bv-off-screen-rating_Quality-Average bv-field-aria-validation-rating_Quality" id="bv-radio-rating_Quality-3" role="radio" type="radio" aria-checked="false" tabindex="0">
                                                                            <span aria-hidden="true">★</span>
                                                                            <span class="bv-off-screen" id="bv-off-screen-rating_Quality-Average">3 stars. Average.</span>
                                                                        </span>
                                                                    </span>
                                                                    <span onclick="ratings('quality', 4)" class="bv-submission-star-rating bv-submission-rater-0 bv-radio-input bv-rating_Quality-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-submission-star-rating-live">
                                                                        <span class="bv-rating-link quality_rating bv-focusable bv-radio-rating-quality-4" aria-labelledby="bv-fieldset-label-text-rating_Quality bv-off-screen-rating_Quality-Good bv-field-aria-validation-rating_Quality" id="bv-radio-rating_Quality-4" role="radio" type="radio" aria-checked="false" tabindex="0">
                                                                            <span aria-hidden="true">★</span>
                                                                            <span class="bv-off-screen" id="bv-off-screen-rating_Quality-Good">4 stars. Good.</span>
                                                                        </span>
                                                                    </span>
                                                                    <span onclick="ratings('quality', 5)" class="bv-submission-star-rating bv-submission-rater-0 bv-radio-input bv-rating_Quality-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-submission-star-rating-live">
                                                                        <span class="bv-rating-link quality_rating bv-focusable bv-radio-rating-quality-5" aria-labelledby="bv-fieldset-label-text-rating_Quality bv-off-screen-rating_Quality-Excellent bv-field-aria-validation-rating_Quality" id="bv-radio-rating_Quality-5" role="radio" type="radio" aria-checked="false" tabindex="0">
                                                                            <span aria-hidden="true">★</span>
                                                                            <span class="bv-off-screen" id="bv-off-screen-rating_Quality-Excellent">5 stars. Excellent.</span>
                                                                        </span>
                                                                    </span>
                                                                </span>
                                                    <ul>
                                                        <li class="bv-radio-rating bv-radio-rating_Quality-group-1 bv-radio-container-li bv-width-from-rating-stats-20"><input type="radio" name="rating_Quality" class="bv-radio-input bv-rating_Quality-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-hidden" value="1" title="Poor"
                                                                                                                                                                               aria-checked="false" aria-hidden="true"></li>
                                                        <li class="bv-radio-rating bv-radio-rating_Quality-group-2 bv-radio-container-li bv-width-from-rating-stats-20"><input type="radio" name="rating_Quality" class="bv-radio-input bv-rating_Quality-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-hidden" value="2" title="Fair"
                                                                                                                                                                               aria-checked="false" aria-hidden="true"></li>
                                                        <li class="bv-radio-rating bv-radio-rating_Quality-group-3 bv-radio-container-li bv-width-from-rating-stats-20"><input type="radio" name="rating_Quality" class="bv-radio-input bv-rating_Quality-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-hidden" value="3" title="Average"
                                                                                                                                                                               aria-checked="false" aria-hidden="true"></li>
                                                        <li class="bv-radio-rating bv-radio-rating_Quality-group-4 bv-radio-container-li bv-width-from-rating-stats-20"><input type="radio" name="rating_Quality" class="bv-radio-input bv-rating_Quality-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-hidden" value="4" title="Good"
                                                                                                                                                                               aria-checked="false" aria-hidden="true"></li>
                                                        <li class="bv-radio-rating bv-radio-rating_Quality-group-5 bv-radio-container-li bv-width-from-rating-stats-20"><input type="radio" name="rating_Quality" class="bv-radio-input bv-rating_Quality-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-hidden" value="5" title="Excellent"
                                                                                                                                                                               aria-checked="false" aria-hidden="true"></li>
                                                    </ul>
                                                    </span> <span class="bv-rating-helper bv-rating-helper-quality-1" aria-hidden="true">Click to rate!</span> </span>
                                                    </span>
                                                </fieldset>
                                                <fieldset class="bv-fieldset bv-fieldset-rating_Value bv-radio-field bv-fieldset-secondary-rating">
                                                    <div class="bv-fieldset-label-wrapper" id="bv-fieldset-label-rating_Value">
                                                        <span class="bv-fieldset-label">
                                                            <span class="bv-fieldset-label-text" id="bv-fieldset-label-text-rating_Value"> Value </span>
                                                            <span aria-hidden="false" class="bv-off-screen bv-field-aria-validation" id="bv-field-aria-validation-rating_Value"></span>
                                                        </span>
                                                    </div>
                                                    <span class="bv-helper">
                                                        <span class="bv-helper-label"></span>
                                                        <span class="bv-helper-icon" aria-hidden="true">
                                                            <span class="bv-helper-icon-positive"> ✔ </span>
                                                            <span class="bv-helper-icon-negative"> ✘ </span>
                                                        </span>
                                                    </span>
                                                    <span class="bv-fieldset-arrowicon"></span>
                                                    <span class="bv-fieldset-inner">
                                                        <span class="bv-fieldset-rating_Value-wrapper bv-fieldset-radio-wrapper" role="radiogroup">
                                                            <!--   Hidden Input for rating value starts -->
                                                                <input type="hidden" value="" name="value" id="value_rating"  style="display: none !important;"/>
                                                            <!--   Hidden Input for rating value ends -->
                                                            <span class="bv-fieldset-rating_Value-group bv-radio-group notranslate">
                                                                <span class="bv-submission-star-rating-control">
                                                                    <span onclick="ratings('value', 1)" class="bv-submission-star-rating bv-submission-rater-0 bv-radio-input bv-rating_Value-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-submission-star-rating-live">
                                                                        <span class="bv-rating-link value_rating bv-focusable bv-radio-rating-value-1" aria-labelledby="bv-fieldset-label-text-rating_Value bv-off-screen-rating_Value-Poor bv-field-aria-validation-rating_Value" id="bv-radio-rating_Value-1" role="radio" type="radio" aria-checked="false" tabindex="0">
                                                                            <span aria-hidden="true">★</span>
                                                                            <span class="bv-off-screen" id="bv-off-screen-rating_Value-Poor">1 star. Poor.</span>
                                                                        </span>
                                                                    </span>
                                                                    <span onclick="ratings('value', 2)" class="bv-submission-star-rating bv-submission-rater-0 bv-radio-input bv-rating_Value-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-submission-star-rating-live">
                                                                        <span class="bv-rating-link value_rating bv-focusable bv-radio-rating-value-2" aria-labelledby="bv-fieldset-label-text-rating_Value bv-off-screen-rating_Value-Fair bv-field-aria-validation-rating_Value" id="bv-radio-rating_Value-2" role="radio" type="radio" aria-checked="false" tabindex="0">
                                                                            <span aria-hidden="true">★</span>
                                                                            <span class="bv-off-screen" id="bv-off-screen-rating_Value-Fair">2 stars. Fair.</span>
                                                                        </span>
                                                                    </span>
                                                                    <span onclick="ratings('value', 3)" class="bv-submission-star-rating bv-submission-rater-0 bv-radio-input bv-rating_Value-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-submission-star-rating-live">
                                                                        <span class="bv-rating-link value_rating bv-focusable bv-radio-rating-value-3" aria-labelledby="bv-fieldset-label-text-rating_Value bv-off-screen-rating_Value-Average bv-field-aria-validation-rating_Value" id="bv-radio-rating_Value-3" role="radio" type="radio" aria-checked="false" tabindex="0">
                                                                            <span aria-hidden="true">★</span>
                                                                            <span class="bv-off-screen" id="bv-off-screen-rating_Value-Average">3 stars. Average.</span>
                                                                        </span>
                                                                    </span>
                                                                    <span onclick="ratings('value', 4)" class="bv-submission-star-rating bv-submission-rater-0 bv-radio-input bv-rating_Value-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-submission-star-rating-live">
                                                                        <span class="bv-rating-link value_rating bv-focusable bv-radio-rating-value-4" aria-labelledby="bv-fieldset-label-text-rating_Value bv-off-screen-rating_Value-Good bv-field-aria-validation-rating_Value" id="bv-radio-rating_Value-4" role="radio" type="radio" aria-checked="false" tabindex="0">
                                                                            <span aria-hidden="true">★</span>
                                                                            <span class="bv-off-screen" id="bv-off-screen-rating_Value-Good">4 stars. Good.</span>
                                                                        </span>
                                                                    </span>
                                                                    <span onclick="ratings('value', 5)" class="bv-submission-star-rating bv-submission-rater-0 bv-radio-input bv-rating_Value-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-submission-star-rating-live">
                                                                        <span class="bv-rating-link value_rating bv-focusable bv-radio-rating-value-5" aria-labelledby="bv-fieldset-label-text-rating_Value bv-off-screen-rating_Value-Excellent bv-field-aria-validation-rating_Value" id="bv-radio-rating_Value-5" role="radio" type="radio" aria-checked="false" tabindex="0">
                                                                            <span aria-hidden="true">★</span>
                                                                            <span class="bv-off-screen" id="bv-off-screen-rating_Value-Excellent">5 stars. Excellent.</span>
                                                                        </span>
                                                                    </span>
                                                                    <!-- Input Error Starts -->
<!--                                                                    <div class="value-error" style="display: none !important;">-->
<!--                                                                        <br/>-->
<!--                                                                        <small class="input-error" style="color: red !important; font-weight: bolder !important; font-size: 12px !important;">Please give a value rating</small>-->
<!--                                                                    </div>-->
                                                                    <!-- Input Error Ends -->
                                                                </span>
                                                    </span> <span class="bv-rating-helper bv-rating-helper-value-1" aria-hidden="true">Click to rate!</span> </span>

                                                    </span>
                                                </fieldset>
                                                <fieldset class="bv-fieldset bv-fieldset-rating_EaseOfUse bv-radio-field bv-fieldset-secondary-rating">
                                                    <div class="bv-fieldset-label-wrapper" id="bv-fieldset-label-rating_EaseOfUse">
                                                        <span class="bv-fieldset-label"> <span class="bv-fieldset-label-text" id="bv-fieldset-label-text-rating_EaseOfUse"> Ease of use </span>
                                                            <span aria-hidden="false" class="bv-off-screen bv-field-aria-validation" id="bv-field-aria-validation-rating_EaseOfUse"></span>
                                                        </span>
                                                    </div>
                                                    <span class="bv-helper">
                                                        <span class="bv-helper-label"></span>
                                                        <span class="bv-helper-icon" aria-hidden="true">
                                                            <span class="bv-helper-icon-positive"> ✔ </span>
                                                            <span class="bv-helper-icon-negative"> ✘ </span>
                                                        </span>
                                                    </span>
                                                    <span class="bv-fieldset-arrowicon"></span>
                                                    <span class="bv-fieldset-inner">
                                                        <span class="bv-fieldset-rating_EaseOfUse-wrapper bv-fieldset-radio-wrapper" role="radiogroup">
                                                            <span class="bv-fieldset-rating_EaseOfUse-group bv-radio-group notranslate">
                                                            <!--   Hidden Input for rating value starts -->
                                                                <input type="hidden" value="" name="ease" id="ease_rating" style="display: none !important;"/>
                                                                <!--   Hidden Input for rating value ends -->
                                                                <span class="bv-submission-star-rating-control">
                                                                    <span onclick="ratings('ease', 1)" class="bv-submission-star-rating bv-submission-rater-0 bv-radio-input bv-rating_EaseOfUse-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-submission-star-rating-live">
                                                                        <span class="bv-rating-link ease_rating bv-focusable bv-radio-rating-ease-1" aria-labelledby="bv-fieldset-label-text-rating_EaseOfUse bv-off-screen-rating_EaseOfUse-Poor bv-field-aria-validation-rating_EaseOfUse" id="bv-radio-rating_EaseOfUse-1" role="radio" type="radio" aria-checked="false" tabindex="0">
                                                                            <span aria-hidden="true">★</span>
                                                                            <span class="bv-off-screen" id="bv-off-screen-rating_EaseOfUse-Poor">1 star. Poor.</span>
                                                                        </span>
                                                                    </span>
                                                                    <span onclick="ratings('ease', 2)" class="bv-submission-star-rating bv-submission-rater-0 bv-radio-input bv-rating_EaseOfUse-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-submission-star-rating-live">
                                                                        <span class="bv-rating-link ease_rating bv-focusable bv-radio-rating-ease-2" aria-labelledby="bv-fieldset-label-text-rating_EaseOfUse bv-off-screen-rating_EaseOfUse-Fair bv-field-aria-validation-rating_EaseOfUse" id="bv-radio-rating_EaseOfUse-2" role="radio" type="radio" aria-checked="false" tabindex="0">
                                                                            <span aria-hidden="true">★</span>
                                                                            <span class="bv-off-screen" id="bv-off-screen-rating_EaseOfUse-Fair">2 stars. Fair.</span>
                                                                        </span>
                                                                    </span>
                                                                    <span onclick="ratings('ease', 3)" class="bv-submission-star-rating bv-submission-rater-0 bv-radio-input bv-rating_EaseOfUse-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-submission-star-rating-live">
                                                                        <span class="bv-rating-link ease_rating bv-focusable bv-radio-rating-ease-3" aria-labelledby="bv-fieldset-label-text-rating_EaseOfUse bv-off-screen-rating_EaseOfUse-Average bv-field-aria-validation-rating_EaseOfUse" id="bv-radio-rating_EaseOfUse-3" role="radio" type="radio" aria-checked="false" tabindex="0">
                                                                            <span aria-hidden="true">★</span>
                                                                            <span class="bv-off-screen" id="bv-off-screen-rating_EaseOfUse-Average">3 stars. Average.</span>
                                                                        </span>
                                                                    </span>
                                                                    <span onclick="ratings('ease', 4)" class="bv-submission-star-rating bv-submission-rater-0 bv-radio-input bv-rating_EaseOfUse-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-submission-star-rating-live">
                                                                        <span class="bv-rating-link ease_rating bv-focusable bv-radio-rating-ease-4" aria-labelledby="bv-fieldset-label-text-rating_EaseOfUse bv-off-screen-rating_EaseOfUse-Good bv-field-aria-validation-rating_EaseOfUse" id="bv-radio-rating_EaseOfUse-4" role="radio" type="radio" aria-checked="false" tabindex="0">
                                                                            <span aria-hidden="true">★</span>
                                                                            <span class="bv-off-screen" id="bv-off-screen-rating_EaseOfUse-Good">4 stars. Good.</span>
                                                                        </span>
                                                                    </span>
                                                                    <span onclick="ratings('ease', 5)" class="bv-submission-star-rating bv-submission-rater-0 bv-radio-input bv-rating_EaseOfUse-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-submission-star-rating-live">
                                                                        <span class="bv-rating-link ease_rating bv-focusable bv-radio-rating-ease-5" aria-labelledby="bv-fieldset-label-text-rating_EaseOfUse bv-off-screen-rating_EaseOfUse-Excellent bv-field-aria-validation-rating_EaseOfUse" id="bv-radio-rating_EaseOfUse-5" role="radio" type="radio" aria-checked="false" tabindex="0">
                                                                            <span aria-hidden="true">★</span>
                                                                            <span class="bv-off-screen" id="bv-off-screen-rating_EaseOfUse-Excellent">5 stars. Excellent.</span>
                                                                        </span>
                                                                    </span>
                                                                </span>
                                                    </span> <span class="bv-rating-helper bv-rating-helper-ease-1" aria-hidden="true">Click to rate!</span> </span>
                                                    </span>
                                                </fieldset>
                                                <fieldset class="bv-fieldset bv-fieldset-rating_Effectiveness bv-radio-field bv-fieldset-secondary-rating">
                                                    <div class="bv-fieldset-label-wrapper" id="bv-fieldset-label-rating_Effectiveness">
                                                        <span class="bv-fieldset-label"> <span class="bv-fieldset-label-text" id="bv-fieldset-label-text-rating_Effectiveness"> Effectiveness </span>
                                                            <span aria-hidden="false" class="bv-off-screen bv-field-aria-validation" id="bv-field-aria-validation-rating_Effectiveness"></span>
                                                        </span>
                                                    </div>
                                                    <span class="bv-helper">
                                                        <span class="bv-helper-label"></span>
                                                        <span class="bv-helper-icon" aria-hidden="true">
                                                            <span class="bv-helper-icon-positive"> ✔ </span>
                                                            <span class="bv-helper-icon-negative"> ✘ </span>
                                                        </span>
                                                    </span>
                                                    <span class="bv-fieldset-arrowicon"></span>
                                                    <span class="bv-fieldset-inner">
                                                        <span class="bv-fieldset-rating_Effectiveness-wrapper bv-fieldset-radio-wrapper" role="radiogroup">
                                                            <span class="bv-fieldset-rating_Effectiveness-group bv-radio-group notranslate">
                                                            <!--   Hidden Input for rating value starts -->
                                                                <input type="hidden" value="" name="effective" id="effective_rating" style="display: none !important;"/>
                                                                <!--   Hidden Input for rating value ends -->
                                                                <span class="bv-submission-star-rating-control">
                                                                    <span onclick="ratings('effective', 1)" class="bv-submission-star-rating bv-submission-rater-0 bv-radio-input bv-rating_Effectiveness-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-submission-star-rating-live">
                                                                        <span class="bv-rating-link effective_rating bv-focusable bv-radio-rating-effective-1" aria-labelledby="bv-fieldset-label-text-rating_Effectiveness bv-off-screen-rating_Effectiveness-Poor bv-field-aria-validation-rating_Effectiveness" id="bv-radio-rating_Effectiveness-1" role="radio" type="radio" aria-checked="false" tabindex="0">
                                                                            <span aria-hidden="true">★</span>
                                                                            <span class="bv-off-screen" id="bv-off-screen-rating_Effectiveness-Poor">1 star. Poor.</span>
                                                                        </span>
                                                                    </span>
                                                                    <span onclick="ratings('effective', 2)" class="bv-submission-star-rating bv-submission-rater-0 bv-radio-input bv-rating_Effectiveness-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-submission-star-rating-live">
                                                                        <span class="bv-rating-link effective_rating bv-focusable bv-radio-rating-effective-2" aria-labelledby="bv-fieldset-label-text-rating_Effectiveness bv-off-screen-rating_Effectiveness-Fair bv-field-aria-validation-rating_Effectiveness" id="bv-radio-rating_Effectiveness-2" role="radio" type="radio" aria-checked="false" tabindex="0">
                                                                            <span aria-hidden="true">★</span>
                                                                            <span class="bv-off-screen" id="bv-off-screen-rating_Effectiveness-Fair">2 stars. Fair.</span>
                                                                        </span>
                                                                    </span>
                                                                    <span onclick="ratings('effective', 3)" class="bv-submission-star-rating bv-submission-rater-0 bv-radio-input bv-rating_Effectiveness-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-submission-star-rating-live">
                                                                        <span class="bv-rating-link effective_rating bv-focusable bv-radio-rating-effective-3" aria-labelledby="bv-fieldset-label-text-rating_Effectiveness bv-off-screen-rating_Effectiveness-Average bv-field-aria-validation-rating_Effectiveness" id="bv-radio-rating_Effectiveness-3" role="radio" type="radio" aria-checked="false" tabindex="0">
                                                                            <span aria-hidden="true">★</span>
                                                                            <span class="bv-off-screen" id="bv-off-screen-rating_Effectiveness-Average">3 stars. Average.</span>
                                                                        </span>
                                                                    </span>
                                                                    <span onclick="ratings('effective', 4)" class="bv-submission-star-rating bv-submission-rater-0 bv-radio-input bv-rating_Effectiveness-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-submission-star-rating-live">
                                                                        <span class="bv-rating-link effective_rating bv-focusable bv-radio-rating-effective-4" aria-labelledby="bv-fieldset-label-text-rating_Effectiveness bv-off-screen-rating_Effectiveness-Good bv-field-aria-validation-rating_Effectiveness" id="bv-radio-rating_Effectiveness-4" role="radio" type="radio" aria-checked="false" tabindex="0">
                                                                            <span aria-hidden="true">★</span>
                                                                            <span class="bv-off-screen" id="bv-off-screen-rating_Effectiveness-Good">4 stars. Good.</span>
                                                                        </span>
                                                                    </span>
                                                                    <span onclick="ratings('effective', 5)" class="bv-submission-star-rating bv-submission-rater-0 bv-radio-input bv-rating_Effectiveness-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-submission-star-rating-live">
                                                                        <span class="bv-rating-link effective_rating bv-focusable bv-radio-rating-effective-5" aria-labelledby="bv-fieldset-label-text-rating_Effectiveness bv-off-screen-rating_Effectiveness-Excellent bv-field-aria-validation-rating_Effectiveness" id="bv-radio-rating_Effectiveness-5" role="radio" type="radio" aria-checked="false" tabindex="0">
                                                                            <span aria-hidden="true">★</span>
                                                                            <span class="bv-off-screen" id="bv-off-screen-rating_Effectiveness-Excellent">5 stars. Excellent.</span>
                                                                        </span>
                                                                    </span>
                                                                </span>
                                                    </span> <span class="bv-rating-helper bv-rating-helper-effective-1" aria-hidden="true">Click to rate!</span> </span>
                                                    </span>
                                                </fieldset>
                                                <fieldset class="bv-fieldset bv-fieldset-rating_Durability bv-radio-field bv-fieldset-secondary-rating">
                                                    <div class="bv-fieldset-label-wrapper" id="bv-fieldset-label-rating_Durability">
                                                        <span class="bv-fieldset-label">
                                                            <span class="bv-fieldset-label-text" id="bv-fieldset-label-text-rating_Durability"> Durability </span>
                                                            <span aria-hidden="false" class="bv-off-screen bv-field-aria-validation" id="bv-field-aria-validation-rating_Durability"></span>
                                                        </span>
                                                    </div>
                                                    <span class="bv-helper">
                                                        <span class="bv-helper-label"></span>
                                                        <span class="bv-helper-icon" aria-hidden="true">
                                                            <span class="bv-helper-icon-positive"> ✔ </span>
                                                            <span class="bv-helper-icon-negative"> ✘ </span>
                                                        </span>
                                                    </span>
                                                    <span class="bv-fieldset-arrowicon"></span>
                                                    <span class="bv-fieldset-inner">
                                                        <span class="bv-fieldset-rating_Durability-wrapper bv-fieldset-radio-wrapper" role="radiogroup">
                                                            <span class="bv-fieldset-rating_Durability-group bv-radio-group notranslate">
                                                            <!--   Hidden Input for rating value starts -->
                                                                <input type="hidden" value="" name="durable" id="durable_rating" style="display: none !important;"/>
                                                                <!--   Hidden Input for rating value ends -->
                                                                <span class="bv-submission-star-rating-control">
                                                                    <span onclick="ratings('durable', 1)" class="bv-submission-star-rating bv-submission-rater-0 bv-radio-input bv-rating_Durability-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-submission-star-rating-live">
                                                                            <span class="bv-rating-link durable_rating bv-focusable bv-radio-rating-durable-1" aria-labelledby="bv-fieldset-label-text-rating_Durability bv-off-screen-rating_Durability-Poor bv-field-aria-validation-rating_Durability" id="bv-radio-rating_Durability-1" role="radio" type="radio" aria-checked="false" tabindex="0">
                                                                            <span aria-hidden="true">★</span>
                                                                            <span class="bv-off-screen" id="bv-off-screen-rating_Durability-Poor">1 star. Poor.</span>
                                                                        </span>
                                                                    </span>
                                                                    <span onclick="ratings('durable', 2)" class="bv-submission-star-rating bv-submission-rater-0 bv-radio-input bv-rating_Durability-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-submission-star-rating-live">
                                                                        <span class="bv-rating-link durable_rating bv-focusable bv-radio-rating-durable-2" aria-labelledby="bv-fieldset-label-text-rating_Durability bv-off-screen-rating_Durability-Fair bv-field-aria-validation-rating_Durability" id="bv-radio-rating_Durability-2" role="radio" type="radio" aria-checked="false" tabindex="0">
                                                                            <span aria-hidden="true">★</span>
                                                                            <span class="bv-off-screen" id="bv-off-screen-rating_Durability-Fair">2 stars. Fair.</span>
                                                                        </span>
                                                                    </span>
                                                                    <span onclick="ratings('durable', 3)" class="bv-submission-star-rating bv-submission-rater-0 bv-radio-input bv-rating_Durability-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-submission-star-rating-live">
                                                                        <span class="bv-rating-link durable_rating bv-focusable bv-radio-rating-durable-3" aria-labelledby="bv-fieldset-label-text-rating_Durability bv-off-screen-rating_Durability-Average bv-field-aria-validation-rating_Durability" id="bv-radio-rating_Durability-3" role="radio" type="radio" aria-checked="false" tabindex="0">
                                                                            <span aria-hidden="true">★</span>
                                                                            <span class="bv-off-screen" id="bv-off-screen-rating_Durability-Average">3 stars. Average.</span>
                                                                        </span>
                                                                    </span>
                                                                    <span onclick="ratings('durable', 4)" class="bv-submission-star-rating bv-submission-rater-0 bv-radio-input bv-rating_Durability-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-submission-star-rating-live">
                                                                        <span class="bv-rating-link durable_rating bv-focusable bv-radio-rating-durable-4" aria-labelledby="bv-fieldset-label-text-rating_Durability bv-off-screen-rating_Durability-Good bv-field-aria-validation-rating_Durability" id="bv-radio-rating_Durability-4" role="radio" type="radio" aria-checked="false" tabindex="0">
                                                                            <span aria-hidden="true">★</span>
                                                                            <span class="bv-off-screen" id="bv-off-screen-rating_Durability-Good">4 stars. Good.</span>
                                                                        </span>
                                                                    </span>
                                                                    <span onclick="ratings('durable', 5)" class="bv-submission-star-rating bv-submission-rater-0 bv-radio-input bv-rating_Durability-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-submission-star-rating-live">
                                                                        <span class="bv-rating-link durable_rating bv-focusable bv-radio-rating-durable-5" aria-labelledby="bv-fieldset-label-text-rating_Durability bv-off-screen-rating_Durability-Excellent bv-field-aria-validation-rating_Durability" id="bv-radio-rating_Durability-5" role="radio" type="radio" aria-checked="false" tabindex="0">
                                                                            <span aria-hidden="true">★</span>
                                                                            <span class="bv-off-screen" id="bv-off-screen-rating_Durability-Excellent">5 stars. Excellent.</span>
                                                                        </span>
                                                                    </span>
                                                                </span>
                                                    <ul>
                                                        <li class="bv-radio-rating bv-radio-rating_Durability-group-1 bv-radio-container-li bv-width-from-rating-stats-20"><input type="radio" name="rating_Durability" class="bv-radio-input bv-rating_Durability-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-hidden" value="1" title="Poor"
                                                                                                                                                                                  aria-checked="false" aria-hidden="true"></li>
                                                        <li class="bv-radio-rating bv-radio-rating_Durability-group-2 bv-radio-container-li bv-width-from-rating-stats-20"><input type="radio" name="rating_Durability" class="bv-radio-input bv-rating_Durability-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-hidden" value="2" title="Fair"
                                                                                                                                                                                  aria-checked="false" aria-hidden="true"></li>
                                                        <li class="bv-radio-rating bv-radio-rating_Durability-group-3 bv-radio-container-li bv-width-from-rating-stats-20"><input type="radio" name="rating_Durability" class="bv-radio-input bv-rating_Durability-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-hidden" value="3" title="Average"
                                                                                                                                                                                  aria-checked="false" aria-hidden="true"></li>
                                                        <li class="bv-radio-rating bv-radio-rating_Durability-group-4 bv-radio-container-li bv-width-from-rating-stats-20"><input type="radio" name="rating_Durability" class="bv-radio-input bv-rating_Durability-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-hidden" value="4" title="Good"
                                                                                                                                                                                  aria-checked="false" aria-hidden="true"></li>
                                                        <li class="bv-radio-rating bv-radio-rating_Durability-group-5 bv-radio-container-li bv-width-from-rating-stats-20"><input type="radio" name="rating_Durability" class="bv-radio-input bv-rating_Durability-input bv-rating-input bv-secondary-rating-input bv-submission-star-rating-applied bv-hidden" value="5" title="Excellent"
                                                                                                                                                                                  aria-checked="false" aria-hidden="true"></li>
                                                    </ul>
                                                    </span> <span class="bv-rating-helper bv-rating-helper-durable-1" aria-hidden="true">Click to rate!</span> </span>
                                                    </span>
                                                </fieldset>
                                                <fieldset class="bv-fieldset bv-fieldset-contextdatavalue_HowDidYouLearn bv-select-field">
                                                    <div class="bv-fieldset-arrowicon"></div>
                                                    <div class="bv-fieldset-inner"> <label for="bv-select-field-contextdatavalue_HowDidYouLearn" class="bv-fieldset-label-wrapper"> <span class="bv-fieldset-label"> </span> </label> </div>
                                                    <div class="bv-fieldsets bv-fieldsets-actions">
                                                        <fieldset class="bv-fieldset bv-fieldset-agreements bv-fieldset-reviews-termsAndConditions bv-checkbox-field ">
                                                            <div class="bv-fieldset-arrowicon"></div>
                                                            <div class="bv-fieldset-inner">
                                                                <div class="bv-checkbox-container">
                                                                    <input id="bv-checkbox-reviews-termsAndConditions" class="bv-checkbox bv-focusable " type="checkbox" value="true" aria-required="true" required="" aria-checked="false" tabindex="0">
                                                                    <label class="bv-fieldset-label-checkbox" for="bv-checkbox-reviews-termsAndConditions">
                                                                        <span class="bv-fieldset-label-text">I agree to the <a href="/tos.php" class="bv-text-link bv-focusable" tabindex="0">terms &amp; conditions</a></span>
                                                                        <span aria-hidden="false" class="bv-off-screen bv-field-aria-validation"></span>
                                                                    </label>
                                                                </div>
                                                                <span class="bv-helper"> <span class="bv-helper-label"></span> <span class="bv-helper-icon" aria-hidden="true"> <span class="bv-helper-icon-positive"> ✔ </span> <span class="bv-helper-icon-negative"> ✘ </span>                                                                </span>
                                                                </span>
                                                            </div>
                                                        </fieldset>
                                                        <div class="bv-form-actions bv-fieldset">
                                                            <div class="bv-fieldset-arrowicon"></div>
                                                            <div class="bv-fieldset-inner">
                                                                <div class="bv-actions-container">
                                                                    <p id="bv-casltext-review" class="bv-fieldset-casltext">You may receive emails regarding this submission. Any emails will include the ability to opt-out of future communications.</p>
                                                                    <button type="submit" name="review_btn" id="review_btn" aria-label="Post Review" aria-describedby="bv-casltext-review" class="bv-form-actions-submit bv-submit bv-focusable bv-submission-button-submit">Post Review</button>
                                                                    <button type="button" class="bv-form-action bv-cancel bv-submission-button-submit">Cancel</button>                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>