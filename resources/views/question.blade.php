<template name="question">
    <a href="#" data-reveal-id={{questionid}} class="callout panel">
        <h3>{{questionTitle}}</h3>
        <p>{{questionContentTruncated}}</p>
    </a>

    <div id={{questionid}} class="reveal-modal" data-reveal>
        <h2>{{questionTitle}}</h2>
        <p>{{questionContent}}</p>
        
        <form method="post" action="".htmlspecialchars($_SERVER["PHP_SELF"])>
            <h3>Answer question</h3>
            <input type="text" placeholder="Title" name="qtitle"/><br/>
            <span class="error">* ".$qtitleErr."</span>
            <input type="text" placeholder="Content" name="qcontent"/><br/>
            <span class="error">* ".$qcontentErr."</span>
            <a href="#" class="small button" type="submit">Ask Question</a>
        </form>

        {{#each answers}}
            {{> answer}}
        {{/each}}
        <a class="close-reveal-modal"></a>
    </div>
</template>