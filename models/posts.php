<?php

class Posts
{
    function index()
    {
      echo "Test";
    }
}
SELECT *
FROM faq
WHERE MATCH(permalien, titre) AGAINST ('tutoriel mysql');
