<?php  
/**
 * Class for handling Category and Subcategory operations.
 */
class Category extends Database {

    public function createCategory($name) {
        $sql = "INSERT INTO categories (name) VALUES (?)";
        return $this->executeNonQuery($sql, [$name]);
    }

    public function createSubcategory($category_id, $name) {
        $sql = "INSERT INTO subcategories (category_id, name) VALUES (?, ?)";
        return $this->executeNonQuery($sql, [$category_id, $name]);
    }

    public function getCategories() {
        $sql = "SELECT * FROM categories ORDER BY name ASC";
        return $this->executeQuery($sql);
    }

    public function getSubcategoriesByCategory($category_id) {
        $sql = "SELECT * FROM subcategories WHERE category_id = ? ORDER BY name ASC";
        return $this->executeQuery($sql, [$category_id]);
    }

    public function getAllCategoriesWithSubcategories() {
        $categories = $this->getCategories();
        $result = [];
        foreach ($categories as $category) {
            $subcategories = $this->getSubcategoriesByCategory($category['category_id']);
            $category['subcategories'] = $subcategories;
            $result[] = $category;
        }
        return $result;
    }
}
?>

