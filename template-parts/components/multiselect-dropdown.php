<?php
/**
 * Multiselect Dropdown Template
 * @package SimpleCharm
 * @since 1.4
 */

$categories = $args['cats'];
?>
  <select name="categories" id="categories" class="simplecharm-multiselect-dropdown" multiple>
    <?php if(!empty($categories) && is_array($categories)):foreach($categories as $category):?>
      <option id="<?php echo esc_attr($category['taxonomy'].''.$category['slug']); ?>" name="<?php echo esc_attr($category['id']); ?>"><?php echo $category['name']; ?></option>
    <?php endforeach;endif; ?>
  </select>
  <div class="simplecharm-select-form-container">
    <div class="simplecharm-select-form-inner">
      <div class="simplecharm-select-form">
    <p><b>Select Categories</b> <span class="simplecharm-selectform-dropdown-icon">&#x2B9F;</span></p>
    <div class="simplecharm-select-options multiselect-closed multiselect-hide">
      <ul>
        <?php if(!empty($categories) && is_array($categories)):foreach($categories as $category):?>
        <li class="<?php echo esc_attr($category['taxonomy'].''.$category['slug']); ?>"><?php echo $category['name']; ?> <input type="checkbox" class="select-checkbox"></li>
        <?php endforeach;endif; ?>
      </ul>
    </div>
    </div>
  </div>
  </div>