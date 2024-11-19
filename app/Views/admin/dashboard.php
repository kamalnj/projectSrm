<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

  <!-- Include Navbar -->
  <?php include 'nav.php'; ?>

  <!-- Main Dashboard -->
  <div class="container mx-auto px-4 py-8">
    <!-- Header Section -->
    <header class="mb-8">
      <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
    </header>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
      <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-lg font-semibold text-gray-800">Suppliers</h2>
        <p class="text-2xl font-bold text-blue-600 mt-2">120</p>
        <p class="text-gray-500 mt-1">Total suppliers managed</p>
      </div>
      <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-lg font-semibold text-gray-800">Contracts</h2>
        <p class="text-2xl font-bold text-blue-600 mt-2">58</p>
        <p class="text-gray-500 mt-1">Active contracts</p>
      </div>
      <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-lg font-semibold text-gray-800">Documents</h2>
        <p class="text-2xl font-bold text-blue-600 mt-2">320</p>
        <p class="text-gray-500 mt-1">Uploaded documents</p>
      </div>
    </div>

    <!-- Recent Activity Table -->
    <div class="bg-white shadow-md rounded-lg p-6">
      <h2 class="text-xl font-semibold text-gray-800 mb-4">Recent Activity</h2>
      <table class="w-full table-auto border-collapse">
        <thead>
          <tr class="bg-gray-100">
            <th class="px-4 py-2 text-left text-gray-600">Activity</th>
            <th class="px-4 py-2 text-left text-gray-600">Date</th>
            <th class="px-4 py-2 text-left text-gray-600">Status</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-b">
            <td class="px-4 py-2">New Supplier Added</td>
            <td class="px-4 py-2">2024-11-18</td>
            <td class="px-4 py-2 text-green-600">Completed</td>
          </tr>
          <tr class="border-b">
            <td class="px-4 py-2">Contract Signed</td>
            <td class="px-4 py-2">2024-11-15</td>
            <td class="px-4 py-2 text-green-600">Completed</td>
          </tr>
          <tr>
            <td class="px-4 py-2">Document Uploaded</td>
            <td class="px-4 py-2">2024-11-12</td>
            <td class="px-4 py-2 text-yellow-600">Pending</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>
