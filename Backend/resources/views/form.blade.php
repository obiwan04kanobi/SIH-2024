@extends('layouts.layout')

@section('content')
    <style>
        body {
            background-color: #f3f4f6;
        }

        .hidden-input {
            display: none;
        }

        .nav-item.active {
            background-color: #3b82f6;
            color: white;
        }

        .nav-item {
            background-color: #e5e7eb;
        }

        .nav-item:hover {
            background-color: #3b82f6;
            color: white;
        }
    </style>
    <div class="flex justify-center items-center min-h-screen">
        <div class="container mx-auto p-6 bg-white shadow-md rounded-lg flex">
            <div class="nav w-1/3 p-4 bg-gray-100 rounded-l-lg">
                <ul>
                    <li><a href="#" id="nav-personal-details" class="block p-4 mb-4 nav-item rounded-lg"
                            onclick="showSection('personal-details', this)">Personal Details</a></li>
                    <li><a href="#" id="nav-education-details" class="block p-4 mb-4 nav-item rounded-lg"
                            onclick="showSection('education-details', this)">Education Details</a></li>
                    <li><a href="#" id="nav-upload-documents" class="block p-4 mb-4 nav-item rounded-lg"
                            onclick="showSection('upload-documents', this)">Upload Documents</a></li>
                    <li><a href="#" id="nav-review-form" class="block p-4 mb-4 nav-item rounded-lg"
                            onclick="showSection('review-form', this)">Review Form</a></li>
                    <li><a href="#" id="nav-submit-form" class="block p-4 mb-4 nav-item rounded-lg"
                            onclick="showSection('submit-form', this)">Submit Form</a></li>
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
                        <input type="checkbox" id="same-address" class="mr-2" onclick="fillCorrespondenceAddress()">
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
                            <option value="Pass">Pass</option>
                            <option value="Fail">Fail</option>
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <label for="passed-year" class="block text-lg mb-2">Passed Year</label>
                        <input type="number" id="passed-year" name="passed-year"
                            class="w-full p-3 border border-gray-300 rounded-lg">
                    </div>

                    <div class="form-group mb-4">
                        <label for="compartment-paper" class="block text-lg mb-2">Compartment Paper</label>
                        <input type="text" id="compartment-paper" name="compartment-paper"
                            class="w-full p-3 border border-gray-300 rounded-lg">
                    </div>
                </div>

                <!--Upload Documents-->
                <div id="upload-documents" class="section hidden">
                    <h2 class="text-2xl font-semibold mb-6">Upload Documents</h2>

                    <div class="form-group mb-4">
                        <label for="10th Marksheet" class="block text-lg mb-2">10th Marksheet</label>
                        <input type="file" id="10th Marksheet" name="10th Marksheet"
                            class="w-full p-3 border border-gray-300 rounded-lg">
                        <button type="button"
                            class="mt-2 p-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600">
                            Verify
                        </button>
                    </div>

                    <div class="form-group mb-4">
                        <label for="12th Marksheet" class="block text-lg mb-2">12th Marksheet</label>
                        <input type="file" id="12th Marksheet" name="12th Marksheet"
                            class="w-full p-3 border border-gray-300 rounded-lg">
                        <button type="button"
                            class="mt-2 p-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600">
                            Verify
                        </button>
                    </div>

                    {{-- <div class="form-group mb-4">
                        <label for="aadhar-photo" class="block text-lg mb-2">Aadhaar Card Photo</label>
                        <input type="file" id="aadhar-photo" name="aadhar-photo"
                            class="w-full p-3 border border-gray-300 rounded-lg">
                        <button type="button"
                            class="mt-2 p-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600">
                            Verify
                        </button>
                    </div> --}}

                    <div class="form-group mb-4">
                        <label for="income-certificate" class="block text-lg mb-2">Income Certificate</label>
                        <input type="file" id="income-certificate" name="income-certificate"
                            class="w-full p-3 border border-gray-300 rounded-lg">
                        <button type="button"
                            class="mt-2 p-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600">
                            Verify
                        </button>
                    </div>

                    <div class="form-group mb-4">
                        <label for="domicile" class="block text-lg mb-2">Domicile Certificate</label>
                        <input type="file" id="domicile" name="domicile"
                            class="w-full p-3 border border-gray-300 rounded-lg">
                        <button type="button"
                            class="mt-2 p-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600">
                            Verify
                        </button>
                    </div>

                    <div class="form-group mb-4">
                        <label for="caste-certificate" class="block text-lg mb-2">Caste Certificate</label>
                        <input type="file" id="caste-certificate" name="caste-certificate"
                            class="w-full p-3 border border-gray-300 rounded-lg">
                        <button type="button"
                            class="mt-2 p-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600">
                            Verify
                        </button>
                    </div>
                </div>

                <!--Review Form-->
                <div id="review-form" class="section hidden">
                    <h2 class="text-2xl font-semibold mb-6">Review Form</h2>
                    <div id="review-content" class="p-4 bg-gray-100 rounded-lg">
                        <!-- Review content will be populated here -->
                    </div>
                </div>

                <!--Submit Form-->
                <div id="submit-form" class="section hidden">
                    <h2 class="text-2xl font-semibold mb-6">Submit Form</h2>
                    <button type="submit"
                        class="w-full p-3 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600">
                        Submit
                    </button>
                </div>

            </div>
        </div>

        <script>
            const sections = document.querySelectorAll('.section');

            function showSection(sectionId, navItem) {
                sections.forEach(section => {
                    if (section.id === sectionId) {
                        section.classList.remove('hidden');
                    } else {
                        section.classList.add('hidden');
                    }
                });

                const navItems = document.querySelectorAll('.nav-item');
                navItems.forEach(item => {
                    if (item === navItem) {
                        item.classList.add('active');
                    } else {
                        item.classList.remove('active');
                    }
                });

                // Populate review content
                if (sectionId === 'review-form') {
                    const reviewContent = document.getElementById('review-content');
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

            function fillCorrespondenceAddress() {
                const isChecked = document.getElementById("same-address").checked;
                const permanentAddress = document.getElementById("permanent-address").value;
                const correspondenceAddress = document.getElementById("correspondence-address");

                if (isChecked) {
                    correspondenceAddress.value = permanentAddress;
                } else {
                    correspondenceAddress.value = "";
                }
            }
        </script>
    </div>
@endsection
