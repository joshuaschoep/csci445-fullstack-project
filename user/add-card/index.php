<head>
    <title>Resum&eacute;</title>
    <link rel="stylesheet" href="add-card.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/2a4e989807.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include '../../generic-header.php'?>
    <section class="content">
        <form>
            <label for="title">Title</label>
            <input type="text" placeholder="Title me!">
            <label for="description">Description</label>
            <input type="textarea" placeholder="Describe the project">
            <label for="link">Link</label>
            <input type="url" placeholder="Link to your project's website">
            <input type="submit" value="Add this card">
        </form>
    </section>
</body>