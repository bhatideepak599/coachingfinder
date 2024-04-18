<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple Selection Dropdown</title>
    <style>
        .container_facility {
            max-width: 400px;
            margin: 20px auto;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        .selected-options-container {
            margin-top: 10px;
            display: flex;
            flex-wrap: wrap;
        }

        .selected-option-set {
            margin: 5px;
            padding: 5px;
            background-color: #f0f0f0;
            border: 1px solid #ddd;
            border-radius: 5px;
            display: flex;
            align-items: center;
        }

        .selected-option {
            margin-right: 5px;
        }

        .delete-button {
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="container_facility">
        <label for="options">Select Options:</label>
        <select id="options" multiple>
            <option value="drinking-water">Drinking Water</option>
            <option value="parking-facility">Parking Facility</option>
            <option value="ac-classroom">AC Classroom</option>
            <option value="24x7-doubt-solving">24x7 Doubt Solving</option>
            <option value="dpp">DPP (Daily Practice Problems)</option>
            <option value="competitive-environment">Competitive Environment</option>
            <!-- Add more options as needed -->
        </select>

        <div id="selectedOptions" class="selected-options-container"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var optionsDropdown = document.getElementById('options');
            var selectedOptionsContainer = document.getElementById('selectedOptions');
            var selectedOptionsData = [];

            optionsDropdown.addEventListener('change', function () {
                updateSelectedOptions();
            });

            function updateSelectedOptions() {
                var selectedOptions = [];

                for (var i = 0; i < optionsDropdown.options.length; i++) {
                    var option = optionsDropdown.options[i];

                    if (option.selected) {
                        selectedOptions.push(option.value);

                        // Disable the selected option
                        option.disabled = true;
                    }
                }

                displaySelectedOptions(selectedOptions);
            }

            function displaySelectedOptions(selectedOptions) {
                // Create a new div for the set of selected options
                var selectedOptionSetDiv = document.createElement('div');
                selectedOptionSetDiv.className = 'selected-option-set';

                selectedOptions.forEach(function (selectedOption) {
                    var selectedOptionDiv = document.createElement('div');
                    selectedOptionDiv.className = 'selected-option';
                    selectedOptionDiv.textContent = selectedOption;

                    // Add a delete button to remove the selected option
                    var deleteButton = document.createElement('span');
                    deleteButton.className = 'delete-button';
                    deleteButton.textContent = '×';
                    deleteButton.onclick = function () {
                        removeSelectedOption(selectedOption, selectedOptionSetDiv);
                    };

                    selectedOptionDiv.appendChild(deleteButton);
                    selectedOptionSetDiv.appendChild(selectedOptionDiv);
                });

                // Append the new div to the container
                selectedOptionsContainer.appendChild(selectedOptionSetDiv);

                // Add the set of selected options to the array
                selectedOptionsData.push(selectedOptions);
            }

            function removeSelectedOption(selectedOption, selectedOptionSetDiv) {
                // Find the corresponding option in the dropdown
                var optionToRemove = document.querySelector(`#options option[value="${selectedOption}"]`);
                if (optionToRemove) {
                    optionToRemove.disabled = false;
                }

                // Remove the set of selected options from the array
                var indexToRemove = selectedOptionsData.findIndex(function (set) {
                    return set.includes(selectedOption);
                });
                if (indexToRemove !== -1) {
                    selectedOptionsData.splice(indexToRemove, 1);
                }

                // Remove the selected option set from the display
                selectedOptionsContainer.removeChild(selectedOptionSetDiv);
            }
        });
    </script>

</body>
</html>
