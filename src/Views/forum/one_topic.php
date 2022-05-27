<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/forum/one_topic.css">
    <title><?= $topic->getClose()? "[Résolu]":"[Non résolu]"?> <?= $topic->getTitle() ?> &bull; Forum <?= $forum->getTitle() ?> &bull;</title>
</head>

<body>
    <?php require_once VIEW_PATH . "Partials/header.php";
    require_once VIEW_PATH . "Partials/forums_nav.php"
    ?>
    <main class="main-topic">
        <aside class="topic-aside">
            <div class="topic-links">
                <a href="/forum/<?= $forum->sluger() ?>-<?= $forum->getId() ?>">Retour à la liste des sujets</a>
                <a href="/forums/sujet/nouveau/forum=<?= $forum->getId() ?>">+ Nouveau sujet</a>
            </div>
        </aside>
        <section class="topic-section">
            <div class="topic-container">
                <h1><?= $topic->getTitle() ?></h1>
                <p class="topic-close <?= !$topic->getClose()?"display-hidden":null?>">Le problème de ce sujet a été résolu</p>
                <div class=" ">
                    <div class="topic-content">
                        <div class="message-card">
                            <div class="autor-picture">
                                <img src="<?= $autor->getImage() ? $autor->getImage() : "/img/logo.jpg" ?>" alt="">
                            </div>
                            <div class="message">
                                <p><span><?= $autor->getUsername() ?></span>, <?= $topic->getCreatedAt() ?> <?= $autor->getUsername() == $_SESSION["user"]["username"] ? "<a href=\"/forum/" . $topic->sluger() . "/" . $topic->getId() . "\">Modifier</a>" : null ?></p>
                                <div>
                                    <?= $topic->getContent() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="topic-answers">
                        <?php foreach ($answers as $answer) : ?>
                            <div class="message-card">
                                <div class="autor-picture">
                                    <img src="<?= $answer->getUserId()->getImage() ? $answer->getUserId()->getImage() : "/img/logo.jpg" ?>" alt="">
                                </div>
                                <div class="message">
                                    <p><span><?= $answer->getUserId()->getUsername() ?></span>, <?= $answer->getCreatedAt() ?> <?= $answer->getUserId()->getUsername() == $_SESSION["user"]["username"] ? "<a href=\"/forum/" . $topic->sluger() . "/" . $topic->getId() . "\">Modifier</a>" : null ?></p>
                                    <div>
                                        <?= $answer->getContent() ?>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <form action="/answer/post/5-5" method="post" class="answer-form">
               
            
                <div class="forl-group">
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <input type="hidden" name="token" value=<?= $token ?>>
                <input type="submit" value="Envoyez">
            </form>

            <?php if (isset($_SESSION["errors"])) {

echo formatArrayMgs($_SESSION["errors"], "warning");
unset($_SESSION["errors"]);
}
//dump($topic, $autor, $answers, $forum, $token);
?>

        </section>


    </main>

</body>

</html>