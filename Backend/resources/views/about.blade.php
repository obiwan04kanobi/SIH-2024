@extends('layouts.layout')

@section('content')
    <div class="bg-gray-50 text-gray-800">

        <!-- Header Section -->
        <header class="bg-blue-600 text-white py-12">
            <div class="container mx-auto text-center">
                <h1 class="text-4xl font-bold">About the Special Scholarship Scheme</h1>
                <p class="mt-4 text-lg">Empowering the youth of Jammu & Kashmir and Ladakh for a brighter future through
                    higher education.</p>
            </div>
        </header>

        <!-- Main Content Section -->
        <main class="container mx-auto py-12 px-6">

            <!-- Background Section -->
            <section class="bg-white rounded-lg shadow-lg p-8 mb-12">
                <div class="flex items-center mb-4">
                    <i data-feather="book" class="text-blue-600 w-8 h-8 mr-3"></i>
                    <h2 class="text-2xl font-semibold text-blue-600">Background</h2>
                </div>
                <p class="leading-relaxed">The Special Scholarship Scheme under the Pradhan Mantri Uchchatar Shiksha
                    Protsahan Yojana aims to provide financial assistance to students from Jammu & Kashmir and Ladakh for
                    pursuing higher education outside their Union Territories. This initiative, following the
                    recommendations of an expert group, offers 5,000 fresh scholarships annually to enhance educational
                    access and employment opportunities for the youth of these regions.</p>
            </section>

            <!-- Objectives and Scope Section -->
            <section class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <div class="flex items-center mb-4">
                        <i data-feather="target" class="text-blue-600 w-8 h-8 mr-3"></i>
                        <h2 class="text-2xl font-semibold text-blue-600">Objectives</h2>
                    </div>
                    <p class="leading-relaxed">The scheme provides financial support covering both academic fees and
                        maintenance allowances for eligible students. It aims to empower the youth of Jammu & Kashmir and
                        Ladakh to compete on a national level and build their capacity for the future.</p>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <div class="flex items-center mb-4">
                        <i data-feather="globe" class="text-blue-600 w-8 h-8 mr-3"></i>
                        <h2 class="text-2xl font-semibold text-blue-600">Scope & Allocation</h2>
                    </div>
                    <p class="leading-relaxed">Annually, 5,000 scholarships are distributed as follows: 2,070 for General
                        Degree Courses, 2,830 for Professional/Engineering courses, and 100 for Medical Courses. The
                        allocation is flexible, allowing adjustments based on demand and unallocated scholarships.</p>
                </div>
            </section>

            <!-- Scholarship Details Section -->
            <section class="bg-white rounded-lg shadow-lg p-8 mb-12">
                <div class="flex items-center mb-4">
                    <i class="bi bi-currency-rupee" style="font-size: 2rem; color: rgb(37, 99, 235)"></i>
                    <h2 class="text-2xl font-semibold text-blue-600">Scholarship Details</h2>
                </div>
                <ul class="list-disc list-inside leading-relaxed">
                    <li><strong>General Degree Courses:</strong> ₹30,000 academic fee + ₹1,00,000 maintenance allowance per
                        annum.</li>
                    <li><strong>Professional/Engineering Courses:</strong> ₹1,25,000 academic fee + ₹1,00,000 maintenance
                        allowance per annum.</li>
                    <li><strong>Medical Courses:</strong> ₹3,00,000 academic fee + ₹1,00,000 maintenance allowance per
                        annum.</li>
                </ul>
            </section>

            <!-- Eligibility and Exclusions Section -->
            <section class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <div class="flex items-center mb-4">
                        <i data-feather="check-circle" class="text-blue-600 w-8 h-8 mr-3"></i>
                        <h2 class="text-2xl font-semibold text-blue-600">Eligibility Criteria</h2>
                    </div>
                    <p class="leading-relaxed">Students must be domiciles of Jammu & Kashmir or Ladakh, have passed Class
                        XII from JKBOSE or CBSE schools in J&K/Ladakh, or hold a Diploma in Engineering for lateral entry.
                        Family income must be below ₹8,00,000 per annum, and applications must be submitted online via the
                        AICTE portal.</p>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <div class="flex items-center mb-4">
                        <i data-feather="x-circle" class="text-blue-600 w-8 h-8 mr-3"></i>
                        <h2 class="text-2xl font-semibold text-blue-600">Exclusions</h2>
                    </div>
                    <p class="leading-relaxed">Certain students are ineligible, including those enrolled in open
                        universities, beneficiaries of other scholarships, or those admitted through management quotas. The
                        scheme also excludes diploma or postgraduate students and those with family incomes exceeding
                        ₹8,00,000 per annum.</p>
                </div>
            </section>

            <!-- Participating Institutes and Admission Process Section -->
            <section class="bg-white rounded-lg shadow-lg p-8 mb-12">
                <div class="flex items-center mb-4">
                    <i class="bi bi-buildings" style="font-size: 2rem; color: rgb(37, 99, 235)"></i>
                    <h2 class="text-2xl font-semibold text-blue-600" style="padding-left: 15px">Participating Institutes & Admission Process</h2>
                </div>
                <p class="leading-relaxed">Eligible institutions must be AICTE-approved, UGC recognized, or NAAC accredited.
                    Special provisions are in place for government nursing institutions, national law universities, and
                    other centrally funded institutions. The admission process involves online registration, document
                    verification, and counseling based on merit lists.</p>
            </section>

            <!-- Reservation and Monitoring Section -->
            <section class="bg-white rounded-lg shadow-lg p-8 mb-12">
                <div class="flex items-center mb-4">
                    <i data-feather="pie-chart" class="text-blue-600 w-8 h-8 mr-3"></i>
                    <h2 class="text-2xl font-semibold text-blue-600">Reservation & Monitoring</h2>
                </div>
                <p class="leading-relaxed">The scheme follows UTs' reservation norms, with specific percentages reserved for
                    SC, ST, SEBC, EWS, and PwD candidates. An Inter-Ministerial Committee (IMC) oversees the implementation
                    and monitoring of the scheme.</p>
            </section>
        </main>

    </div>
@endsection
