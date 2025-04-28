jQuery(document).ready(function($) {
     
    $(document).on('click', '.bedroom-filter-btn', function () {
    $('.bedroom-filter-btn').removeClass('active');
    $(this).addClass('active');
    currentPage = 1;
    loadUnits();
});
     $('#your-quiz-form').on('submit', function(e) {
        e.preventDefault();
        
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'fp_quiz_submit',
                nonce: $('#fp-quiz-nonce').val(),
                first_name: $('#first_name').val(),
                last_name: $('#last_name').val(),
                email: $('#email').val(),
                phone: $('#phone').val(),
                receive_texts: $('#receive_texts').is(':checked') ? 1 : 0,
                quiz_answers: $('input[name="quiz_answers"]:checked').map(function() {
                    return this.value;
                }).get()
            },
            success: function(response) {
                if (response.success) {
                    window.location.href = response.data.redirect_url; // Redirect to results page
                } else {
                    alert('Error: ' + response.data);
                }
            },
            error: function() {
                alert('An error occurred. Please try again.');
            }
        });
    });
    // Check if data is available
    if (typeof fpQuizData === 'undefined') {
        console.error('Floor Plan Quiz: Data not loaded');
        return;
    }

    // Apply custom colors
    applyCustomColors();
    
    // Initialize quiz variables
    let currentQuestion = 0;
    let answers = [];
    const questions = fpQuizData.questions;
    const triggerButtonId = fpQuizData.trigger_button || 'csacsac';
    
    // Set up event listeners
    $(`#${triggerButtonId}`).on('click', function(e) {
        e.preventDefault();
        openQuiz();
    });
    
    $('#fpQuizStartButton').on('click', openQuiz);
    $('#fpQuizCloseButton').on('click', closeQuiz);
    $('#fpQuizNextButton').on('click', nextQuestion);
    $('#fpQuizPrevButton').on('click', prevQuestion);
    $('#fpQuizResetButton').on('click', resetQuiz);
    
    // Open quiz function
    function openQuiz() {
        $('#fpQuizStartOverlay').hide();
        $('#fpQuizContainer').show();
        $('body').addClass('fp-quiz-active');
        currentQuestion = 0;
        answers = [];
        showQuestion();
        updatePreferences();
        updateNavigationButtons();
    }
    
    // Close quiz function
    function closeQuiz() {
        $('#fpQuizContainer').hide();
        $('#fpQuizStartOverlay').hide();
        $('body').removeClass('fp-quiz-active');
    }
    
    // Show current question
    function showQuestion() {
        const q = questions[currentQuestion];
        $('#fpQuizQuestionText').text(q.text);
        
        const optionsHtml = q.options.map(option => `
            <label class="fp-quiz-option">
                <input type="radio" name="fp-quiz-option" value="${option}"> 
                ${option}
            </label>
        `).join('');
        
        $('#fpQuizOptionsContainer').html(optionsHtml);
        updateNavigationButtons();
    }
    
    // Next question function
    function nextQuestion() {
        const selected = $('input[name="fp-quiz-option"]:checked');
        if (!selected.length) {
            alert("Please select an option!");
            return;
        }

        answers[currentQuestion] = selected.val();
        updatePreferences();
        currentQuestion++;

        if (currentQuestion < questions.length) {
            showQuestion();
        } else {
            showFinalSummary();
        }
    }
    
    function prevQuestion() {
        if (currentQuestion > 0) {
            currentQuestion--;
            showQuestion();
        }
    }
    
    function updateNavigationButtons() {
        // Show/hide previous button
        if (currentQuestion === 0) {
            $('#fpQuizPrevButton').hide();
        } else {
            $('#fpQuizPrevButton').show();
        }
        
        // Change next button text on last question
        if (currentQuestion === questions.length - 1) {
            $('#fpQuizNextButton').text('See Results');
            $('#fpQuizNextButton').on('click', showForm); 
        } else {
            $('#fpQuizNextButton').text('Next');
        }
    }
    
    function showFinalSummary() {
        $('#fpQuizLeft').html(`
            <h2>Here's what you selected:</h2>
            <ul>${answers.map((ans, index) => `
                <li>
                    <strong>${questions[index].text}:</strong> ${ans}
                </li>
            `).join('')}</ul>
            <button class="fp-quiz-next-btn" id="fpQuizShowFormButton">Find More Plans</button>
        `);
        
        $('#fpQuizShowFormButton').on('click', showForm);        			

    }
    
    // Show form
    function showForm() {
        $('#fpQuizLeft').html(`
            <h2>THIS ONE’S GOT YOUR NAME ALL OVER IT.</h2>
            <p>Quick intro and you’re all set...</p>
            <div class="fp-quiz-form-section">
                <input type="text" placeholder="First Name*" id="fpFirstName" required>
                <input type="text" placeholder="Last Name" id="fpLastName">
                <input type="email" placeholder="Email Address*" id="fpEmail" required>
                <input type="tel" placeholder="Phone Number*" id="fpPhone" required>
                <label class="fp-quiz-form-checkbox">
                    <input type="checkbox" id="fpReceiveTexts"> Yes, I'd be happy to receive text messages!
                </label>
                <button class="fp-quiz-submit-btn" id="fpQuizSubmitButton">Drumroll, please...</button>
            </div>
        `);
        
        $('#fpQuizSubmitButton').on('click', submitForm);
    }
    
    // Update preferences sidebar
    function updatePreferences() {
        const prefContainer = $('#fpQuizSelectedAnswers');
        prefContainer.empty();
        answers.forEach((ans, index) => {
            if (ans) {
                const questionText = questions[index]?.text || `Question ${index + 1}`;
                prefContainer.append(`
                    <div class="fp-quiz-preference-item">
                        <strong>${questionText}:</strong> 
                        <span>${ans}</span>
                    </div>
                `);
            }
        });
    }
    
    // Reset quiz function
    function resetQuiz() {
        currentQuestion = 0;
        answers = [];
        showQuestion();
        updatePreferences();
    }
    
  // Update the submitForm function in fp-quiz.js
function submitForm() {
   
    console.log('Answers are: '+answers);
$.ajax({
            url: 'https://threaddc.com/wp-admin/admin-ajax.php', // Now properly defined
            type: 'POST',
            data: {
                action: 'fp_quiz_submit',
                // nonce: fpQuizVars.nonce, // Optional: Use dynamic nonce
                first_name: $('#fpFirstName').val(),
                last_name: $('#fpLastName').val(),
                email: $('#fpEmail').val(),
                phone: $('#fpPhone').val(),
                receive_texts: $('#receive_texts').is(':checked') ? 1 : 0,
                quiz_answers: answers
            },
            success: function(response) {
                if (response.success) {
                    window.location.href = response.data.redirect_url; // Redirect to results page
                } else {
                    alert('Error: ' + response.data);
                }
            },
            error: function() {
                alert('An error occurred. Please try again.');
            }
        });
}
    
    // Apply custom colors from settings
    function applyCustomColors() {
        const root = document.documentElement;
        root.style.setProperty('--fp-primary-color', 'linear-gradient(90deg, rgb(148, 169, 255) 0%, rgb(33, 163, 168) 0%, rgb(136, 202, 0) 100%)' || 'linear-gradient(90deg, rgb(148, 169, 255) 0%, rgb(33, 163, 168) 0%, rgb(136, 202, 0) 100%)');
        root.style.setProperty('--fp-secondary-color', fpQuizData.secondary_color || '#fbdada');
        root.style.setProperty('--fp-button-color', fpQuizData.button_color || '#D9534F');
    }

    let currentPage = 1;
    let timer;
    
    // Initial load
    loadUnits();
    
    // Filter events
    $('#unit-search, #bedrooms-filter, #bathrooms-filter, #price-max, #affordable-only').on('input change', function() {
        currentPage = 1;
        clearTimeout(timer);
        timer = setTimeout(loadUnits, 300); // Debounce 300ms
    });
    
    // Pagination
    $(document).on('click', '.page-link', function(e) {
        e.preventDefault();
        currentPage = $(this).data('page');
        loadUnits();
    });
    
    function loadUnits() {
        $('#units-loading').show();
                console.log('asd');

const filters = {
    search: $('#unit-search').val(),
    bedrooms: $('#bedrooms-filter .bedroom-filter-btn.active').data('bedrooms') || '',
    bathrooms: $('#bathrooms-filter .bathroom-filter-btn.active').data('bathrooms') || '',
    movein: $('#movein-filter').val(),
    price: $('#price-max').val(),
    // affordable_only: $('#affordable-only').is(':checked'),
    page: currentPage
};
        console.log("affordable_only"+ $('#affordable-only').is(':checked'));

        $.ajax({
            url: 'https://threaddc.com/wp-admin/admin-ajax.php',
            type: 'POST',
            data: {
                action: 'filter_units',
                ...filters
            },
            success: function(response) {
                if (response.success) {
                    $('#units-container').html(response.data.html);
                    $('#units-pagination').html(response.data.pagination);
                }
            },
            complete: function() {
                $('#units-loading').hide();
            }
        });
    }

    const data = RentManagerData.units;
    const quiz = RentManagerQuiz || {};
    const tableBody = $('#unit-table tbody');

    function renderTable(units) {
        tableBody.empty();
        if (units.length === 0) {
            tableBody.append('<tr><td colspan="5">No units found.</td></tr>');
            return;
        }

        units.forEach(unit => {
             const address = `${unit.StreetAddress || ''}, ${unit.City || ''}, ${unit.State || ''} ${unit.PostalCode || ''}`;
            tableBody.append(`
                <tr>
                    <td>${unit.UnitName}</td>
                    <td>${address}</td>
                    <td>${unit.Bedrooms}</td>
                    <td>${parseFloat(unit.Bathrooms) % 1 === 0 ? parseInt(unit.Bathrooms) : unit.Bathrooms}</td>

                    <td>$${parseFloat(unit.Price).toFixed(2)}</td>
                </tr>
            `);
        });
    }

    function populateFilters() {
        const properties = new Set();
        const bedrooms = new Set();        
        const bathrooms = new Set();
        const prices = new Set();
console.log(typeof data); // Should be "object" for arrays
console.log(Array.isArray(data)); // Should be true
console.log("Data structure:", data);
        data.forEach(unit => {
            if (unit.UnitName) properties.add(unit.UnitName);
            if (unit.Bedrooms) bedrooms.add(unit.Bedrooms);
            if (unit.Bathrooms) bathrooms.add(unit.Bathrooms);
            if (unit.Price) prices.add(unit.Price);
        });

        [...properties].sort().forEach(p => $('#filter-property').append(`<option value="${p}">${p}</option>`));
        [...bedrooms].sort().forEach(b => $('#filter-bedrooms').append(`<option value="${b}">${b}</option>`));
        [...bathrooms].sort().forEach(b => $('#filter-bathrooms').append(`<option value="${b}">${parseFloat(b) % 1 === 0 ? parseInt(b) : b}
</option>`));
        [...prices].sort((a, b) => a - b).forEach(p => $('#filter-price').append(`<option value="${p}">$${parseFloat(p).toFixed(2)}</option>`));
    }

    function applyFilters() {
        const prop = $('#filter-property').val();
        const bed = $('#filter-bedrooms').val();
        const bath = $('#filter-bathrooms').val();
        const price = $('#filter-price').val();
        console.log('proece is: '  + price + "bath" +bath + " bed" + bed);
console.log(typeof data); // Should be "object" for arrays
console.log(Array.isArray(data)); // Should be true
         const filtered = data.filter(unit => {
            if(price === '2999'){
                return (!prop || unit.UnitName === prop) &&
                   (!bed || unit.Bedrooms === bed) &&
                   (!bath || unit.Bathrooms === bath) &&
                   (!price || parseFloat(unit.Price) <= parseFloat(price));
            }
            else{
                return (!prop || unit.UnitName === prop) &&
                   (!bed || unit.Bedrooms === bed) &&
                   (!bath || unit.Bathrooms === bath) &&
                   (!price || parseFloat(unit.Price) >= parseFloat(price));
            }

        });

        renderTable(filtered);
    }

    function autoApplyQuizFilter() {
        if (quiz.bedrooms) {
            // Match "3+" with available Bedroom values like "3", "4", etc.
            $('#filter-bedrooms').val(quiz.bedrooms.replace('+', '')).trigger('change');
        }
if (quiz.bathrooms) {
    const value = quiz.bathrooms.replace('+', '') + '.0'; // convert "2" to "2.0"
    $('#filter-bathrooms').val(value).trigger('change');
}
        console.log("quiz.budget"+quiz.budget);
        if (quiz.budget) {
            if (quiz.budget === '$$' || quiz.budget === '$') {
                $('#filter-price').val(2999).trigger('change');
            }
            
            else{
            	$('#filter-price').val(3000).trigger('change');
            }
            console.log('quiz.budget'+ quiz.budget);
        }
    }

    $('#filter-property, #filter-bedrooms,#filter-bathrooms, #filter-price').on('change', applyFilters);

    populateFilters();
    renderTable(data);

    // Wait briefly for dropdowns to populate, then apply quiz filter
    setTimeout(() => {
        autoApplyQuizFilter();
    }, 100);
});