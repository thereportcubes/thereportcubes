<footer class="footer">
               <div class="row">
                  <div class="col-12 col-sm-6 text-center text-sm-left">
                     <p>&copy; Copyright 2023. All rights reserved.</p>
                  </div>
                  <div class="col  col-sm-6 ml-sm-auto text-center text-sm-right">
                     <p>Dashboard <i class="fa fa-heart text-danger mx-1"></i> by Tyche</p>
                  </div>
               </div>

               <script>
                  // Flag to track whether the form is dirty (has unsaved changes)
                  let formIsDirty = false;

                  // Add event listeners to form elements to track changes
                  const form = document.getElementById('myForm');
                  form.addEventListener('input', () => {
                        formIsDirty = true;
                  });

                  // Add event listener to form submission to reset the formIsDirty flag
                  form.addEventListener('submit', () => {
                        formIsDirty = false;
                  });

                  // Add event listener for the beforeunload event
                  window.addEventListener('beforeunload', (event) => {
                        if (formIsDirty) {
                           // Display a confirmation dialog
                           const confirmationMessage = 'You have unsaved changes. Are you sure you want to leave?';
                           event.returnValue = confirmationMessage; // Standard for most browsers
                           return confirmationMessage; // For some older browsers
                        }
                  });
               </script>
</footer>