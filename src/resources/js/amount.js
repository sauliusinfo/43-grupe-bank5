// Function to replace commas with periods in the input field
function replaceCommasWithPeriods() {
    const inputElement = document.getElementById("amountInput");
    const inputValue = inputElement.value;

    // Replace commas with periods and update the input field value
    const newValue = inputValue.replace(/,/g, ".");
    inputElement.value = newValue;
}

// Add an event listener to the input field to trigger the replacement when the input changes
document.getElementById("amountInput").addEventListener("input", replaceCommasWithPeriods);
