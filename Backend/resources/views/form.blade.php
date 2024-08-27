@extends('layouts.layout')

@section('content')
    <style>
        body {
            background-color: #f3f4f6;
        }

        .hidden-input {
            display: none;
        }

        .active {
            @apply bg-blue-500 text-white;
        }
    </style>
    <div class="flex justify-center items-center min-h-screen">
        <div class="container mx-auto p-6 bg-white shadow-md rounded-lg flex">
            <div class="nav w-1/3 p-4 bg-gray-100 rounded-l-lg">
                <ul>
                    <li><a href="#"
                            class="block p-4 mb-4 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition"
                            onclick="showSection('personal-details')">Personal Details</a></li>
                    <li><a href="#"
                            class="block p-4 mb-4 bg-gray-200 hover:bg-blue-500 hover:text-white rounded-lg transition"
                            onclick="showSection('education-details')">Education Details</a></li>
                    <li><a href="#"
                            class="block p-4 mb-4 bg-gray-200 hover:bg-blue-500 hover:text-white rounded-lg transition"
                            onclick="showSection('upload-documents')">Upload Documents</a></li>
                    <li><a href="#"
                            class="block p-4 mb-4 bg-gray-200 hover:bg-blue-500 hover:text-white rounded-lg transition"
                            onclick="showSection('review-form')">Review Form</a></li>
                    <li><a href="#"
                            class="block p-4 mb-4 bg-gray-200 hover:bg-blue-500 hover:text-white rounded-lg transition"
                            onclick="showSection('submit-form')">Submit Form</a></li>
                </ul>
            </div>

            <div class="content w-2/3 p-6 bg-white rounded-r-lg">

                <!--Personal Details-->
                <div id="personal-details" class="section">
                    <h2 class="text-2xl font-semibold mb-6">Personal Details</h2>

                    <div class="form-group mb-4">
                        <label for="name" class="block text-lg mb-2">Name</label>
                        <input type="text" id="name" name="name"
                            class="w-full p-3 border border-gray-300 rounded-lg">
                    </div>

                    <div class="form-group mb-4">
                        <label for="changed-name" class="block text-lg mb-2">Changed Name</label>
                        <input type="text" id="changed-name" name="changed-name"
                            class="w-full p-3 border border-gray-300 rounded-lg">
                    </div>

                    <div class="form-group mb-4">
                        <label for="fathername" class="block text-lg mb-2">Father's Name</label>
                        <input type="text" id="fathername" name="fathername"
                            class="w-full p-3 border border-gray-300 rounded-lg">
                    </div>

                    <div class="form-group mb-4">
                        <label for="mothername" class="block text-lg mb-2">Mother's Name</label>
                        <input type="text" id="mothername" name="mothername"
                            class="w-full p-3 border border-gray-300 rounded-lg">
                    </div>

                    <div class="form-group mb-4">
                        <label for="email" class="block text-lg mb-2">Email</label>
                        <input type="email" id="email" name="email"
                            class="w-full p-3 border border-gray-300 rounded-lg">
                    </div>

                    <div class="form-group mb-4">
                        <label for="contact" class="block text-lg mb-2">Contact Number</label>
                        <input type="number" id="contact" name="contact"
                            class="w-full p-3 border border-gray-300 rounded-lg">
                    </div>

                    <div class="form-group mb-4">
                        <label for="dob" class="block text-lg mb-2">Date of Birth</label>
                        <input type="date" id="dob" name="dob"
                            class="w-full p-3 border border-gray-300 rounded-lg">
                    </div>

                    <div class="form-group mb-4">
                        <label for="permanent-address" class="block text-lg mb-2">Permanent Address</label>
                        <input type="text" id="permanent-address" name="permanent-address"
                            class="w-full p-3 border border-gray-300 rounded-lg">
                    </div>

                    <div class="form-group mb-4 flex items-center">
                        <input type="checkbox" id="same-address" class="mr-2">
                        <label for="same-address" class="text-lg">Same as Permanent Address</label>
                    </div>

                    <div class="form-group mb-4">
                        <label for="correspondence-address" class="block text-lg mb-2">Correspondence Address</label>
                        <input type="text" id="correspondence-address" name="correspondence-address"
                            class="w-full p-3 border border-gray-300 rounded-lg">
                    </div>

                    <div class="form-group mb-4">
                        <label for="gender" class="block text-lg mb-2">Gender</label>
                        <select id="gender" name="gender" onchange="handleGenderChange()"
                            class="w-full p-3 border border-gray-300 rounded-lg">
                            <option value="" disabled selected>Select your gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                        <input type="text" id="otherGender" name="otherGender"
                            class="hidden-input w-full p-3 border border-gray-300 rounded-lg mt-2"
                            placeholder="Please specify">
                    </div>

                    <div class="form-group mb-4">
                        <label for="category" class="block text-lg mb-2">Category</label>
                        <select id="category" name="category" required
                            class="w-full p-3 border border-gray-300 rounded-lg">
                            <option value="" disabled selected>Select your category</option>
                            <option value="General">General</option>
                            <option value="SC">SC</option>
                            <option value="ST">ST</option>
                            <option value="OBC">OBC</option>
                        </select>
                    </div>
                </div>

                <!--Education Details-->
                <div id="education-details" class="section hidden">
                    <h2 class="text-2xl font-semibold mb-6">Education Details</h2>

                    <div class="form-group mb-4">
                        <label for="qualifying-education" class="block text-lg mb-2">Qualifying Education</label>
                        <select id="qualifying-education" name="qualifying-education" required
                            class="w-full p-3 border border-gray-300 rounded-lg">
                            <option value="" disabled selected>Select your education</option>
                            <option value="12">12</option>
                            <option value="diploma">Diploma</option>
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <label for="qualifying-board" class="block text-lg mb-2">Qualifying Education Board</label>
                        <select id="qualifying-board" name="qualifying-board" required
                            class="w-full p-3 border border-gray-300 rounded-lg">
                            <option value="" disabled selected>Select your board</option>
                            <option value="CBSE">CBSE</option>
                            <option value="JKBOSE">JKBOSE</option>
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <label for="roll-number" class="block text-lg mb-2">Roll Number</label>
                        <input type="text" id="roll-number" name="roll-number"
                            class="w-full p-3 border border-gray-300 rounded-lg">
                    </div>

                    <div class="form-group mb-4">
                        <label for="percentage" class="block text-lg mb-2">Percentage</label>
                        <input type="number" id="percentage" min="0" max="100" name="percentage"
                            class="w-full p-3 border border-gray-300 rounded-lg">
                    </div>

                    <div class="form-group mb-4">
                        <label for="cgpa" class="block text-lg mb-2">CGPA</label>
                        <input type="number" id="cgpa" min="0" max="10" name="cgpa"
                            class="w-full p-3 border border-gray-300 rounded-lg">
                    </div>

                    <div class="form-group mb-4">
                        <label for="qualifying-education-status" class="block text-lg mb-2">Qualifying Education
                            Status</label>
                        <select id="qualifying-education-status" name="qualifying-education-status" required
                            class="w-full p-3 border border-gray-300 rounded-lg">
                            <option value="" disabled selected>Select status</option>
                            <option value="Passed">Passed</option>
                            <option value="Appeared">Appeared</option>
                            <option value="Compartment">Compartment</option>
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <label for="passed-year" class="block text-lg mb-2">Passed Year</label>
                        <input type="text" id="passed-year" name="passed-year"
                            class="w-full p-3 border border-gray-300 rounded-lg">
                    </div>

                    <div class="form-group mb-4">
                        <label for="compartment-paper" class="block text-lg mb-2">Compartment Paper Name</label>
                        <input type="text" id="compartment-paper" name="compartment-paper"
                            class="w-full p-3 border border-gray-300 rounded-lg">
                    </div>
                </div>

                <!--Upload Documents-->
                <div id="upload-documents" class="section hidden">
                    <h2 class="text-2xl font-semibold mb-6">Upload Documents</h2>

                    <div class="form-group mb-4">
                        <label for="10th-marksheet" class="block text-lg mb-2">10th Marksheet</label>
                        <input type="file" id="10th-marksheet" name="10th-marksheet"
                            class="w-full p-3 border border-gray-300 rounded-lg">
                    </div>

                    <div class="form-group mb-4">
                        <label for="12th-marksheet" class="block text-lg mb-2">12th Marksheet</label>
                        <input type="file" id="12th-marksheet" name="12th-marksheet"
                            class="w-full p-3 border border-gray-300 rounded-lg">
                    </div>

                    <div class="form-group mb-4">
                        <label for="category-certificate" class="block text-lg mb-2">Category Certificate</label>
                        <input type="file" id="category-certificate" name="category-certificate"
                            class="w-full p-3 border border-gray-300 rounded-lg">
                    </div>

                    <div class="form-group mb-4">
                        <label for="domicile-certificate" class="block text-lg mb-2">Domicile Certificate</label>
                        <input type="file" id="domicile-certificate" name="domicile-certificate"
                            class="w-full p-3 border border-gray-300 rounded-lg">
                    </div>
                </div>

                <!--Review Form-->
                <div id="review-form" class="section hidden">
                    <h2 class="text-2xl font-semibold mb-6">Review Form</h2>
                    <div id="review-content">
                        <!-- Filled data will be displayed here -->
                    </div>
                </div>

                <!--Submit Form-->
                <div id="submit-form" class="section hidden">
                    <h2 class="text-2xl font-semibold mb-6">Submit Form</h2>
                    <button
                        class="w-full bg-green-500 text-white py-3 rounded-lg hover:bg-green-600 transition">Submit</button>
                </div>

            </div>
        </div>

        <script>
            const sections = document.querySelectorAll('.section');
            const reviewContent = document.getElementById('review-content');

            function showSection(sectionId) {
                sections.forEach(section => section.classList.add('hidden'));
                document.getElementById(sectionId).classList.remove('hidden');

                // Populate review content
                if (sectionId === 'review-form') {
                    reviewContent.innerHTML = `
              <p><strong>Name:</strong> ${document.getElementById('name').value}</p>
              <p><strong>Father's Name:</strong> ${document.getElementById('fathername').value}</p>
              <p><strong>Mother's Name:</strong> ${document.getElementById('mothername').value}</p>
              <p><strong>Email:</strong> ${document.getElementById('email').value}</p>
              <p><strong>Contact:</strong> ${document.getElementById('contact').value}</p>
              <p><strong>DOB:</strong> ${document.getElementById('dob').value}</p>
              <p><strong>Gender:</strong> ${document.getElementById('gender').value}</p>
              <p><strong>Category:</strong> ${document.getElementById('category').value}</p>
              <p><strong>Qualifying Education:</strong> ${document.getElementById('qualifying-education').value}</p>
              <p><strong>Board:</strong> ${document.getElementById('qualifying-board').value}</p>
              <p><strong>Roll No:</strong> ${document.getElementById('roll-number').value}</p>
              <p><strong>Percentage:</strong> ${document.getElementById('percentage').value}</p>
              <p><strong>CGPA:</strong> ${document.getElementById('cgpa').value}</p>
              <p><strong>Status:</strong> ${document.getElementById('qualifying-education-status').value}</p>
              <p><strong>Passed Year:</strong> ${document.getElementById('passed-year').value}</p>
              <p><strong>Compartment Paper:</strong> ${document.getElementById('compartment-paper').value}</p>
            `;
                }
            }

            function handleGenderChange() {
                const genderSelect = document.getElementById('gender');
                const otherGenderInput = document.getElementById('otherGender');

                if (genderSelect.value === 'Other') {
                    otherGenderInput.classList.remove('hidden-input');
                } else {
                    otherGenderInput.classList.add('hidden-input');
                }
            }
        </script>
        <script>
            document.getElementById('same-address').addEventListener('change', function() {
                const permanentAddress = document.getElementById('permanent-address').value;
                const correspondenceAddress = document.getElementById('correspondence-address');

                if (this.checked) {
                    correspondenceAddress.value = permanentAddress;
                    correspondenceAddress.setAttribute('readonly', true);
                } else {
                    correspondenceAddress.value = '';
                    correspondenceAddress.removeAttribute('readonly');
                }
            });
        </script>
    </div>
@endsection
