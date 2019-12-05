<head>
    <title>Resum&eacute;</title>
    <link rel="stylesheet" href="add-card.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/2a4e989807.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include '../generic-header.php'?>
    <section class="content">
        <form id="new-card-form" action="add_card.php" method="get">
            <label for="title">Title</label>
            <input type="text" placeholder="Title me!" name="title">
            <label for="description">Description</label>
            <textarea placeholder="Describe the project" name="description"></textarea>
            <label for="link">Link</label>
            <input type="url" placeholder="Link to your project's website" name="link">
            <input type="submit" value="Add this card">
        </form>
    </section>
</body>