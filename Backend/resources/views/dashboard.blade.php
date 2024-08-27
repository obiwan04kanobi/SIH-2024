@extends('layouts.layout')

@section('content')
<div class="bg-gray-100">
  {{-- <!-- Navbar -->
  <nav class="bg-blue-600 p-4 text-white">
    <div class="container mx-auto flex justify-between items-center">
      <h1 class="text-2xl font-bold">Student Dashboard</h1>
      <div>
        <button class="px-4 py-2 bg-blue-700 hover:bg-blue-800 rounded">Logout</button>
      </div>
    </div>
  </nav> --}}

  <!-- Main Content -->
  <div class="container mx-auto mt-8">
    <!-- Header -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
      <h2 class="text-2xl font-bold text-gray-800">Welcome, [Student Name]</h2>
      <p class="text-gray-600">Track your scholarship application progress and manage your submissions here.</p>
    </div>

    <!-- Dashboard Widgets -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Apply for Scholarship Widget -->
      <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Apply for Scholarship</h3>
        <p class="text-gray-600 mb-4">Start your application for the PMSSS scholarship.</p>
        <button class="w-full bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700" href="/apply">Apply Now</button>
      </div>

      <!-- Submission Status Widget -->
      <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Submission Status</h3>
        <ul class="text-gray-600">
          <li class="mb-2">Document 1: <span class="text-green-600">Verified</span></li>
          <li class="mb-2">Document 2: <span class="text-yellow-600">Pending</span></li>
          <li>Document 3: <span class="text-red-600">Rejected</span></li>
        </ul>
        <button class="mt-4 w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">View Details</button>
      </div>

      <!-- Notifications Widget -->
      <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Notifications</h3>
        <div class="text-gray-600">
          <p class="mb-2">Your scholarship application has been received.</p>
          <p class="mb-2">Document 2 requires additional verification.</p>
          <p class="mb-2">Your payment is being processed.</p>
        </div>
        <button class="mt-4 w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">View All</button>
      </div>
    </div>

    <!-- Recent Activity Table -->
    <div class="bg-white p-6 rounded-lg shadow-md mt-6">
      <h3 class="text-xl font-bold text-gray-800 mb-4">Recent Activity</h3>
      <table class="min-w-full bg-white">
        <thead>
          <tr>
            <th class="py-2 px-4 border-b border-gray-200 text-left text-gray-800">Date</th>
            <th class="py-2 px-4 border-b border-gray-200 text-left text-gray-800">Activity</th>
            <th class="py-2 px-4 border-b border-gray-200 text-left text-gray-800">Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="py-2 px-4 border-b border-gray-200">2024-08-20</td>
            <td class="py-2 px-4 border-b border-gray-200">Submitted Scholarship Application</td>
            <td class="py-2 px-4 border-b border-gray-200 text-green-600">Completed</td>
          </tr>
          <tr>
            <td class="py-2 px-4 border-b border-gray-200">2024-08-21</td>
            <td class="py-2 px-4 border-b border-gray-200">Document Verification</td>
            <td class="py-2 px-4 border-b border-gray-200 text-yellow-600">Pending</td>
          </tr>
          <tr>
            <td class="py-2 px-4 border-b border-gray-200">2024-08-22</td>
            <td class="py-2 px-4 border-b border-gray-200">Payment Processed</td>
            <td class="py-2 px-4 border-b border-gray-200 text-green-600">Completed</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection