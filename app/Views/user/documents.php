<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Télécharger des fichiers</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <?php include 'navUser.php'; ?>
    <div class="container space-y-4 p-8 bg-white shadow-md rounded-lg w-3/4 mx-auto mt-4">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Télécharger des fichiers</h1>

        <div class="grid grid-cols-3 gap-4 p-4 ">
            <!-- Formulaire pour le premier fichier -->
            <form class="max-w-lg mx-auto bg-white shadow-md p-4 rounded-lg" action="/documents/upload" method="post" enctype="multipart/form-data">
                <label class="block mb-2 text-sm font-medium text-gray-900" for="files1">RC</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" aria-describedby="user_avatar_help1" id="files1" name="files[]" accept=".pdf, .jpg, .jpeg, .png" required type="file">
                <div class="mt-1 text-sm text-gray-500" id="user_avatar_help1">Vous pouvez télécharger jusqu'à 6 fichiers.</div>
                <button type="submit" class="mt-4 w-full bg-blue-500 text-white font-medium py-2 px-4 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Téléverser</button>
            </form>

            <!-- Répéter pour les autres fichiers -->
            <form class="max-w-lg mx-auto mt-4 bg-white shadow-md p-4 rounded-lg" action="/user/upload" method="post" enctype="multipart/form-data">
                <label class="block mb-2 text-sm font-medium text-gray-900" for="files2">Attestation regularite fiscale</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" aria-describedby="user_avatar_help2" id="files2" name="files[]" accept=".pdf, .jpg, .jpeg, .png" type="file">
                <div class="mt-1 text-sm text-gray-500" id="user_avatar_help2">Vous pouvez télécharger jusqu'à 6 fichiers.</div>
                <button type="submit" class="mt-4 w-full bg-blue-500 text-white font-medium py-2 px-4 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Téléverser</button>
            </form>

            <form class="max-w-lg mx-auto mt-4 bg-white shadow-md p-4 rounded-lg" action="/user/upload" method="post" enctype="multipart/form-data">
                <label class="block mb-2 text-sm font-medium text-gray-900" for="files3">Attestation CNSS</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" aria-describedby="user_avatar_help3" id="files3" name="files[]" accept=".pdf, .jpg, .jpeg, .png" type="file">
                <div class="mt-1 text-sm text-gray-500" id="user_avatar_help3">Vous pouvez télécharger jusqu'à 6 fichiers.</div>
                <button type="submit" class="mt-4 w-full bg-blue-500 text-white font-medium py-2 px-4 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Téléverser</button>
            </form>
        </div>
        <div class="grid grid-cols-3 gap-4 p-4">
            <form class="max-w-lg mx-auto mt-4 bg-white shadow-md p-4 rounded-lg" action="/user/upload" method="post" enctype="multipart/form-data">
                <label class="block mb-2 text-sm font-medium text-gray-900" for="files4">Attestation de RIB</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" aria-describedby="user_avatar_help4" id="files4" name="files[]" accept=".pdf, .jpg, .jpeg, .png" type="file">
                <div class="mt-1 text-sm text-gray-500" id="user_avatar_help4">Vous pouvez télécharger jusqu'à 6 fichiers.</div>
                <button type="submit" class="mt-4 w-full bg-blue-500 text-white font-medium py-2 px-4 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Téléverser</button>
            </form>

            <form class="max-w-lg mx-auto mt-4 bg-white shadow-md p-4 rounded-lg" action="/user/upload" method="post" enctype="multipart/form-data">
                <label class="block mb-2 text-sm font-medium text-gray-900" for="files5">Bilan des 3 dernieres annees</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" aria-describedby="user_avatar_help5" id="files5" name="files[]" accept=".pdf, .jpg, .jpeg, .png" type="file">
                <div class="mt-1 text-sm text-gray-500" id="user_avatar_help5">Vous pouvez télécharger jusqu'à 6 fichiers.</div>
                <button type="submit" class="mt-4 w-full bg-blue-500 text-white font-medium py-2 px-4 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Téléverser</button>
            </form>

            <form class="max-w-lg mx-auto mt-4 bg-white shadow-md p-4 rounded-lg" action="/user/upload" method="post" enctype="multipart/form-data">
                <label class="block mb-2 text-sm font-medium text-gray-900" for="files6">CGA</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" aria-describedby="user_avatar_help6" id="files6" name="files[]" accept=".pdf, .jpg, .jpeg, .png" type="file">
                <div class="mt-1 text-sm text-gray-500" id="user_avatar_help6">Vous pouvez télécharger jusqu'à 6 fichiers.</div>
                <button type="submit" class="mt-4 w-full bg-blue-500 text-white font-medium py-2 px-4 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Téléverser</button>
            </form>
        </div>
    </div>
</body>

</html>