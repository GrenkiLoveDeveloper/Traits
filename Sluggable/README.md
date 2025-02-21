Теперь при сохранении будет замена

```
$category = new Category();
$category->title = "Web Development";
$category->save();

echo $category->slug; // "web-development"
```