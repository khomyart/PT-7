<?php
    $feedbackData = [];

    /**
     * Returns TRUE if current request is POST, otherwise FALSE
     *
     * @return bool
     */
    function isPostRequest() {
        return defined('IS_POST_REQUEST');
    }

    /**
     * Returns value of a given field
     *
     * @param string $field
     * @return string
     */
    function getFieldValue($field) {
        global $feedbackData;
        global $product;
        if (isset($feedbackData[$field])) {
            return $product[$field];
        } else {
            return '';
        }
    }

    /**
     * Returns a css class for a given field
     *
     * @param array $feedbackData
     * @param string $field
     * @return string
     */
    function getFeedbackClass(&$feedbackData, $field) {
        if (!isPostRequest()) {
            return '';
        }

        return isset($feedbackData[$field]) ? 'is-invalid' : 'is-valid';
    }

    /**
     * Returns a feedback block for a given field
     *
     * @global array $feedbackData
     * @param string $field
     * @return string
     */
    function getFeedbackBlock($field) {
        global $feedbackData;

        if (!isPostRequest()) {
            return '';
        }

        if (isset($feedbackData[$field])) {
            return '<div class="invalid-feedback">'.$feedbackData[$field].'</div>';
        } else {
            return '<div class="valid-feedback">Looks good!</div>';
        }
    }

    /**
    *
    * Checks a string for unecceptable symbols, where allowed symbols are 
    * located in "@param array $comparation_symbols". If found not allowed  
    * symbol - print "@param string $error_message" under given field
    *
    * @global array $product
    * @param string $field
    * @param array $comparation_symbols
    * @param string $error_message
    *
    */
    function fieldSymbolsValidation($field, $comparation_symbols, $error_message){
        global $product;
        $splited = str_split($product[$field]);
        foreach ($splited as $index) {
            foreach ($comparation_symbols as $symbol) {
                $symbol_validness = 0;
                if ($index === $symbol){
                    $symbol_validness = 1;
                    break;
                }
            }
            if($symbol_validness===0) {
                addFeedback($field, $error_message);
                break;
            };
        }
    }

    /**
     * Is a helper method for adding feedback for a particular field
     *
     * @global array $feedbackData
     * @param string $field
     * @param string $feedback
     */
    function addFeedback($field, $feedback) {
        global $feedbackData;

        $feedbackData[$field] = $feedback;
    }

     /**
     * File emptyness and presence checker. 
     *
     * @param string $file_name
     */
    function fileCheck($file_name) {
        if(file_exists($file_name)){
            echo ($file_name.' exists. <br />');
            if (filesize($file_name)==0) {
                echo ($file_name.' is empty. <br />');
            } else {
                echo ($file_name.' is full of interesting little symbols. <br />');
            }
        } else {
            echo ($file_name.' does not exist. <br />');
        }
        clearstatcache();
    }

     /**
     * Write string array "$mfp" to a file "$filename" using "$words_devider" for dividing words in string; (uses  file_put_contents)
     *
     * @param array $mfp
     * @param string $words_devider
     * @param string $filename
     */
    function fpcAlgorithm($mfp, $words_devider, $filename) {
        foreach ($mfp as &$key) { //adding divider in the end of an each element of a $product
            $key = $key.$words_devider;
        }
        file_put_contents($filename, $mfp); //writing file with $mfp massive
    }

     /**
     * Write string array "$mfp" to a file "$filename" using "$words_devider" for dividing words in string; (uses  fopen, fwrite, fclose)
     *
     * @param array $mfp
     * @param string $words_devider
     * @param string $filename
     */

    function fopAlgorithm($mfp, $words_devider, $filename) {
        foreach ($mfp as &$key) { 
            $key = $key.$words_devider;
        }
        $fop = fopen($filename, "w"); 
        $mfp = implode($mfp);
        fwrite ($fop, $mfp); 
        fclose ($fop); 
    }

     /**
     * Deletes file with name "$filename"
     *
     * @param string $filename
     */

    function fileDel ($filename) {
        if(unlink($filename)) {
            echo ($filename.' has been deleted');
        } else {
            echo ($filename.' cannot be deleted because of unexpected error');
        }
    }


    if (!empty($_POST['product'])) {
        define('IS_POST_REQUEST', true);

        $product = $_POST['product'];

        if (strlen($product['title']) < 15) {
            addFeedback('title', 'Min. length is 15 symbols');
        }

        if (strlen($product['sdesc']) < 20) {
            addFeedback('sdesc', 'Min. length is 20 symbols');
        }

        if (strlen($product['desc']) < 25) {
            addFeedback('desc', 'Min. length is 25 symbols');
        }

        if ($product['min-price'] <= 0) {
            addFeedback('min-price', 'Min. price must be more than 0');
        }

        if ($product['min-stay'] < 0 
        || $product['min-stay'] > $product['max-stay'] 
        || empty($product['min-stay'])) {
            addFeedback('min-stay', 'Min. stay is not on available value');
        }

        if ($product['max-stay'] < 0 
        || $product['max-stay'] < $product['min-stay'] 
        || empty($product['max-stay'])) {
            addFeedback('max-stay', 'Max. stay is not on available value');
        }

        if ($product['c-policy'] === "0" ) {
            addFeedback("c-policy", 'No empty allowed');
        }

        if (strlen($product['nettwerk']) < 3 ) {
            addFeedback("nettwerk", 'Min. length is 3 symbols');
        }

        if (strlen($product['nettwerk-pass']) < 3 ) {
            addFeedback("nettwerk-pass", 'Password length cannot be less than 3 symbols!');
        }

        if ((stristr($product['mail'], '@') === FALSE) 
        || (strlen($product['mail']) < 4))  {
            addFeedback("mail", 'Email address length is not enough (3 symbols min) or symbol "@" is not here');
        }

        if(strlen($product["phone"])<7) {
            addFeedback("phone", 'Min. length is 7 symbols');
        }
        
        $check_symbols = ["","0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "+", "(", ")"];

        fieldSymbolsValidation("phone",  $check_symbols, 'Not allowed symbols in phone number');
    }
?>