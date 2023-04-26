<?php
class StoryValidator extends Validator {
    public function __construct($data=[]) {
        parent::__construct($data);
    }

    public function validate($imageRequired = true) {
        if (!$this->isPresent("heading")) {
            $this->errors["heading"] = "Please enter a heading.";
        }
        else if (!$this->minLength("heading", 10)) {
            $this->errors["heading"] = "Heading must be at least 10 characters.";
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

        if (!$this->isPresent("publish_date")) {
            $this->errors["publish_date"] = "Please enter a date.";
        }

        if (!$this->isPresent("publish_time")) {
            $this->errors["publish_time"] = "Please enter a time.";
        }

        if (!$this->isPresent("article")) {
            $this->errors["article"] = "Please enter an article.";
        }
        else if (!$this->minLength("article", 15)) {
            $this->errors["article"] = "Article must be at least 500 characters.";
        }

        if (!$this->isPresent("category_id")) {
            $this->errors["category_id"] = "Please choose a category.";
        }

        if ($imageRequired && !$this->hasFile("image")) {
            $this->errors["image"] = "Please upload an image.";
        }

        return count($this->errors) === 0;
    }
}
?>