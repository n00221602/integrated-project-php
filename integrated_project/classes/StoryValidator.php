<?php
class StoryValidator extends Validator {
    public function __construct($data=[]) {
        parent::__construct($data);
    }

    public function validate() {
        if (!$this->isPresent("headline")) {
            $this->errors["headline"] = "Please enter a headline.";
        }
        else if (!$this->minLength("headline", 10)) {
            $this->errors["headline"] = "Headline must be at least 10 characters.";
        }


        if (!$this->isPresent("sub_heading")) {
            $this->errors["sub_heading"] = "Please enter a sub heading.";
        }
        else if (!$this->minLength("sub_heading", 15)) {
            $this->errors["sub_heading"] = "Sub heading must be at least 15 characters.";
        }


        if (!$this->isPresent("author")) {
            $this->errors["author"] = "Please enter a author.";
        }
        else if (!$this->minLength("author", 6)) {
            $this->errors["author"] = "Author must be at least 6 characters.";
        }


        if (!$this->validateDate("date")) {
            $this->errors["date"] = "Please enter a date.";
        }

        if (!$this->validateTime("time")) {
            $this->errors["time"] = "Please enter a time.";
        }

        if (!$this->isPresent("article")) {
            $this->errors["article"] = "Please enter an article.";
        }
        else if (!$this->minLength("article", 500)) {
            $this->errors["article"] = "Article must be at least 500 characters.";
        }

        $validCategories = ["Entertainment", "Politics", "Sports"];
        if (!$this->isPresent("category")) {
            $this->errors["category"] = "Please choose a category.";
        }
        else if (!$this->isElement("category", $validCategories)) {
            $this->errors["category"] = "Please choose a valid category.";
        }

        return count($this->errors) === 0;
    }
}
?>