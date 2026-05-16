<?php

/**
 * Get the base path
 * 
 * 
 * @param string $path
 * @return string
 */

function basePath($path = '')
{
    return __DIR__ . '/' . $path;
}

/**
 * Load view
 * 
 * @param string $name
 * @return void
 */

function loadView($name, $data = [])
{
    $viewPath = basePath("App/views/{$name}.view.php");

    if (file_exists($viewPath)) {
        extract($data);
        require $viewPath;
    } else {
        echo "View {$name} not found.";
    }

}

/**
 * Load partials
 * 
 * @param string $name
 * @return void
 */

function loadPartial($name)
{
    $partialPath = basePath("App/views/partials/{$name}.php");
    
    if (file_exists($partialPath)) {
        require $partialPath;
    } else {
        echo "Partial '{$name}' not found.";
    }
}

/**
 * 
 * 
 * 
 * 
 */

function formatSalary($salary) {
    return '$' .  number_format(floatval($salary));
}

function inspect($value)
{
    echo '<pre style="background:#1e1e1e;color:#f8f8f2;padding:1rem;border-radius:8px;line-height:1.5;">';
    echo htmlspecialchars(print_r($value, true), ENT_QUOTES, 'UTF-8');
    echo '</pre>';
}