<!-- Success Modal -->
<div id="successModal" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 left-0 z-50 w-full h-full bg-gray-900 bg-opacity-50  justify-center items-center">
    <div class="relative p-6 bg-white rounded-lg shadow-lg w-full max-w-md mx-4">
        <div class="flex justify-center mb-4">
            <svg class="w-16 h-16 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </div>
        <h3 class="text-2xl font-semibold text-center text-gray-900">Success!</h3>
        <p class="text-center text-lg text-gray-600 mt-2">The supplier has been successfully added.</p>
        <div class="mt-6 flex justify-center gap-4">
            <!-- <button onclick="closeModal()" class="px-6 py-2 text-white bg-green-500 hover:bg-green-600 rounded-lg focus:outline-none focus:ring-4 focus:ring-green-300 transition">Close</button> -->
            <button onclick="window.location.href='/admin/suppliers'" class="px-6 py-2 text-green-700 bg-transparent border-2 border-green-500 hover:bg-green-500 hover:text-white rounded-lg focus:outline-none focus:ring-4 focus:ring-green-300 transition">Go to List</button>
        </div>
    </div>
</div>


<script>
   // Function to show the success modal
function showSuccessModal() {
    const successModal = document.getElementById('successModal');
    successModal.classList.remove('hidden'); // Show the modal
}

// Function to close the success modal
function closeModal() {
    const successModal = document.getElementById('successModal');
    successModal.classList.add('hidden'); // Hide the modal
}

// Trigger the modal upon success response
document.querySelector("form").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission to handle with AJAX

    const formData = new FormData(event.target);
    const formAction = event.target.action;  // Get the action URL (addsuppliers route)

    fetch(formAction, {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showSuccessModal();  // Show the modal on success
        } else {
            alert("Error adding supplier");
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert("An unexpected error occurred.");
    });
});


</script>