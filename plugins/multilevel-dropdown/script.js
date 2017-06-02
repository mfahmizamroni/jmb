/*
 * Copyright Shorif Ali (http://github.com/shorifali/)
 * Licensed under MIT (https://opensource.org/licenses/MIT)
 *
 */

'use strict';

$(document).ready(function() {

    // Default option
    var option = '<option selected="selected" disabled="disabled">Select Option</option>';

    // Method to clear dropdowns down to a given level
    var clearDropDown = function(arrayObj, startIndex) {
        $.each(arrayObj, function(index, value) {
            if(index >= startIndex) {
                $(value).html(option);
            }
        });
    };

    // Method to disable dropdowns down to a given level
    var disableDropDown = function(arrayObj, startIndex) {
        $.each(arrayObj, function(index, value) {
            if(index >= startIndex) {
                $(value).attr('disabled', 'disabled');
            }
        });
    };

    // Method to disable dropdowns down to a given level
    var enableDropDown = function(that) {
        that.removeAttr('disabled');
    };

    // Method to generate and append options
    var generateOptionsAdult = function(element, selection) {
        var options = '';
        options += '<option value=1>Conversation and Grammar </option>';
        element.append(options);
    };

    var generateOptionsLow = function(element, selection) {
        var options = '';
        options += '<option value=1>Kindergarten 1,2,3 </option>';
        options += '<option value=2>Pre-Beginner 1,2,3 </option>';
        options += '<option value=3>Beginner 1,2,3 </option>';
        options += '<option value=4>Basic 1,2,3 </option>';
        element.append(options);
    };

    var generateOptionsMid = function(element, selection) {
        var options = '';
        options += '<option value=1>Elementary 1,2,3 & 4,5,6 </option>';
        options += '<option value=2>Post-Elementary 1,2,3 & 4,5,6 </option>';
        options += '<option value=3>Moderate 1,2,3 & 4,5,6 > Inter 1</option>';
        options += '<option value=4>Pre-Intermediate 1,2,3 </option>';
        options += '<option value=5>Intermediate 1,2,3 </option>';
        options += '<option value=6>Post-Intermediate 1,2,3 </option>';
        element.append(options);
    };

    var generateOptionsHigh = function(element, selection) {
        var options = '';
        options += '<option value=1>Advance 1,2,3 </option>';
        options += '<option value=2>English 101,102 </option>';
        options += '<option value=3>English 201,202,301,302 </option>';
        element.append(options);
    };

    // Select each of the dropdowns
    var firstDropDown = $('#first');
    var secondDropDown = $('#second');
    var thirdDropDown = $('#third');

    // Hold selected option
    var firstSelection = '';
    var secondSelection = '';
    var thirdSelection = '';

    // Hold selection
    var selection = '';

    // Selection handler for first level dropdown
    firstDropDown.on('change', function() {

        // Get selected option
        firstSelection = firstDropDown.val();

        // Clear all dropdowns down to the hierarchy
        clearDropDown($('select'), 1);

        // Disable all dropdowns down to the hierarchy
        disableDropDown($('select'), 1);

        // Check current selection
        if(firstSelection === '0') {
            return;
        }

        // Enable second level DropDown
        enableDropDown(secondDropDown);

        // Generate and append options
        selection = firstSelection;
        console.log(selection);
        switch(selection) {
            case "Adult":
                generateOptionsAdult(secondDropDown, selection);
                break;
            case "Lower Level":
                generateOptionsLow(secondDropDown, selection);
                break;
            case "Mid Level":
                generateOptionsMid(secondDropDown, selection);
                break;
            case "Higher Level":
                generateOptionsHigh(secondDropDown, selection);
                break;
        }
    });

    // Selection handler for second level dropdown
    secondDropDown.on('change', function() {
        secondSelection = secondDropDown.val();

        // Clear all dropdowns down to the hierarchy
        clearDropDown($('select'), 2);

        // Disable all dropdowns down to the hierarchy
        disableDropDown($('select'), 2);

        // Check current selection
        if(secondSelection === '0') {
             return;
        }

        // Enable third level DropDown
        enableDropDown(thirdDropDown);

        // Generate and append options
        selection = firstSelection + '-' + secondSelection;
        generateOptions(thirdDropDown, selection, 4);
    });

    // Selection handler for third level dropdown
    thirdDropDown.on('change', function() {
        thirdSelection = thirdDropDown.val();

        console.log(thirdSelection);
        // Final work goes here

     });

    /*
     * In this way we can make any number of dependent dropdowns
     *
     */

});
