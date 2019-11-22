
<?php
    include "func_and_IFs.php";
    include "head.php";
    $file_fpc = "fpc_data.dat";
    $file_fop = "fop_data.dat";
    $words_devider="**|||";
    
    //$_POST = ["fopchecker", "fopdeleter", "fpcchecker", "fpcdeleter"];
?>
    <body>
        <br>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="text-center">Property Data</h2>
                    <form action="index.php" method="post">
                        <!-- Descriptions -->
                        <div class="section-header">Description</div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="input-title">Title</label>
                                <input type="text" 
                                    class="form-control <?= getFeedbackClass($feedbackData, 'title');?>" 
                                    id="input-title" name="product[title]" 
                                    placeholder="Title" 
                                    value="<?= getFieldValue('title')?>">
                                <?= getFeedbackBlock('title'); ?>
                            </div>

                            <div class="form-group col-12">
                                <label for="input-sdesc">Short Description</label>
                                <input type="text" 
                                    class="form-control <?= getFeedbackClass($feedbackData, 'sdesc'); ?>" 
                                    id="input-sdesc" name="product[sdesc]" 
                                    placeholder="Short Description" 
                                    value="<?= getFieldValue('sdesc')?>">
                                <?= getFeedbackBlock('sdesc'); ?>
                            </div>

                            <div class="form-group col-12">
                                <label for="input-desc">Description</label>
                                <textarea class="form-control <?= getFeedbackClass($feedbackData, 'desc'); ?>" 
                                        id="input-desc" name="product[desc]" 
                                        cols="30" rows="5" placeholder="Description"><?= getFieldValue('desc')?></textarea>
                                <?= getFeedbackBlock('desc'); ?>
                            </div>
                        </div>
                        <!-- WiFi section -->
                        <div class="section-header">Restrictions</div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="input-min-price">Min. price</label>
                                <input type="number" 
                                    class="form-control  <?= getFeedbackClass($feedbackData, 'min-price'); ?>" 
                                    id="input-min-price"  name="product[min-price]" placeholder="Min. price" 
                                    value="<?= getFieldValue('min-price')?>">
                                <?= getFeedbackBlock('min-price'); ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="input-min-stay">Min. stay</label>
                                <input type="number" 
                                    class="form-control <?= getFeedbackClass($feedbackData, 'min-stay'); ?>" 
                                    id="input-min-stay" name="product[min-stay]" placeholder="Min. stay" 
                                    value="<?= getFieldValue('min-stay')?>">
                                <?= getFeedbackBlock('min-stay');?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="input-max-stay">Max. stay</label>
                                <input type="number" 
                                    class="form-control <?= getFeedbackClass($feedbackData, 'max-stay'); ?>" 
                                    id="input-max-stay" name="product[max-stay]" placeholder="Max. stay" 
                                    value="<?= getFieldValue('max-stay')?>">
                                <?= getFeedbackBlock('max-stay'); ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="select-c-policy">Cancellation Policy</label>
                                <select class="form-control <?= getFeedbackClass($feedbackData, 'c-policy'); ?>" 
                                        id="select-c-policy" name="product[c-policy]" 
                                        value="<?= getFieldValue('c-policy')?>">
                                    <option value="0">Empty</option>
                                    <option value="1">Flexible: Full refund 1 day prior to arrival, except fees</option>
                                    <option value="3">Moderate: Full refund 5 days prior to arrival, except fees</option>
                                    <option value="11">Strict Non Refundable</option>
                                    <option value="21">Partially Refundable</option>
                                    <option value="22">Partially Refundable 14 Days prior</option>
                                </select>
                                <?= getFeedbackBlock('c-policy'); ?>
                            </div>
                        </div>

                        <!-- WiFi section -->
                        <div class="section-header">Wi-Fi</div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="input-wifi-network">Network</label>
                                <input type="text" 
                                    class="form-control <?= getFeedbackClass($feedbackData, 'nettwerk'); ?>"
                                    name="product[nettwerk]" id="input-wifi-network" placeholder="Network" 
                                    value="<?= getFieldValue('nettwerk')?>">
                                <?= getFeedbackBlock('nettwerk'); ?>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="input-wifi-password">Password</label>
                                <input type="text" 
                                    class="form-control <?= getFeedbackClass($feedbackData, 'nettwerk-pass'); ?>" 
                                    name="product[nettwerk-pass]" id="input-wifi-password" placeholder="Password" 
                                    value="<?= getFieldValue('nettwerk-pass')?>">
                                <?= getFeedbackBlock('nettwerk-pass'); ?>
                            </div>
                        </div>

                        <!-- Owner info -->
                        <div class="section-header">Owner data</div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="input-owner-email">Email</label>
                                <input type="email" 
                                    class="form-control <?= getFeedbackClass($feedbackData, 'mail'); ?>" 
                                    id="input-owner-email" name="product[mail]" placeholder="Owner's email" 
                                    value="<?= getFieldValue('mail')?>">
                                <?= getFeedbackBlock('mail'); ?>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="input-owner-phone">Phone</label>
                                <input type="text" 
                                    class="form-control <?= getFeedbackClass($feedbackData, 'phone'); ?>" 
                                    id="input-owner-phone" name="product[phone]" placeholder="Owner's phone" 
                                    value="<?= getFieldValue('phone')?>">
                                <?= getFeedbackBlock('phone'); ?>
                            </div>
                        </div>

                        <hr>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Save data</button>
                        </div>
                    </form>
                    <br/><br/>
                </div>
            </div>
           
                <!--FILES_WRITER--><!--FILES_WRITER--><!--FILES_WRITER-->
                <?php
                    if (empty($feedbackData)) {
                        fpcAlgorithm($product, $words_devider, $file_fpc);
                        fopAlgorithm($product, $words_devider, $file_fop);
                    };
                ?>
                <!--FILES_WRITER--><!--FILES_WRITER--><!--FILES_WRITER-->

                <form class="text-center" action="/validation_page.php" method="get" target="_blank"> 
                    <h3>
                        <br><br>
                        CHECKERS
                        <hr>
                    </h3>

                    <button type="submit" class="btn btn-primary" name="button1" value="fpc_check"> 
                        FPC Checker 
                    </button>
                    <button type="submit" class="btn btn-primary" name="button2" value="fop_check"> 
                        FOP Checker 
                    </button>

                    <h3>
                        <br><br>
                        DELETERS
                        <hr>
                    </h3>
                    <button type="submit" class="btn btn-primary" name="button3" value="fpc_deleter"> 
                        FPC Deleter 
                    </button>
                    <button type="submit" class="btn btn-primary" name="button4" value="fop_deleter"> 
                        FOP Deleter 
                    </button>

                    <h3>
                        <br><br>
                        CLEANERS
                        <hr>
                    </h3>
                    <button type="submit" class="btn btn-primary" name="button5" value="fpc_cleaner"> 
                        FPC Cleaner 
                    </button>

                    <button type="submit" class="btn btn-primary" name="button6" value="fop_cleaner"> 
                        FOP Cleaner 
                    </button>

                    <h3>
                        <br><br>
                        READERS
                        <hr>
                    </h3>
                        <button type="submit" name="button7" value="fpc_reader" class="btn btn-primary">
                            FPC Reader 
                        </button>

                        <button type="submit" name="button8" value="fop_reader" class="btn btn-primary"> 
                            FOP Reader 
                        </button>
                        
                </form>

                <div style="height: 100px;"> </div>
        </div>

<?php
    include "footer.php";
?>
    </body>
</html>
