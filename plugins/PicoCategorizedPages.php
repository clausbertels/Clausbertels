<?php

/**
 * Plugin for categorized pages
 *
 * @author David Boulard
 * @link https://github.com/arckauss/Pico-Categorized-Pages
 * @license http://opensource.org/licenses/MIT
 * @version 1.0.0
 */

class PicoCategorizedPages extends AbstractPicoPlugin
{
    protected $categories = array();
    protected $enabled = true;
    protected $base_url;
    protected $catpages_order;
    protected $catpages_order_by;
    protected $categories_order;

    public function onConfigLoaded(array &$config) // load configuration settings into local variables
    {
        $this->base_url = $this->getConfig('base_url');
        $this->catpages_order = $this->getConfig('catpages_order');
        $this->catpages_order_by = $this->getConfig('catpages_order_by');
        $this->categories_order = $this->getConfig('categories_order');
    }

    public function onMetaHeaders(array &$headers) // not sure what this does
    {
       $headers['position'] = 'Position';
       $headers['page_ignore'] = 'Page_Ignore';
       $headers['category_position'] = 'Category_Position';
       $headers['category_title'] = 'Category_Title';
       $headers['category_ignore'] = 'Category_Ignore';
    }

    public function onPagesLoaded(
    array &$pages,
    array &$currentPage = null,
    array &$previousPage = null,
    array &$nextPage = null
    ) {
        // if($this->catpages_order_by == 'position') { There's no other value than 'position' so useless for now
            $temp_categories = array();
            $ignored_categories = array();

            foreach($pages as $page) { // first loop
                $current_category = $this->getCurrentCategoryFromURL($page['url']);

                if($page['meta']['category_ignore'] == true) { // if cat ignored, add to ignored cats array
                    $ignored_categories[] = $current_category;
                    // equals array_push($ignored_categories, $current_category);
                }

                if( $current_category != '' // if not empty
                    && !in_array($current_category, $ignored_categories) // if not ignored
                    && !array_key_exists($current_category, $temp_categories) // if it's not in temp_cat yet
                    && $page['meta']['category_position'] != '') { // cat_pos is not empty aka it's the index page
                        $temp_categories[$current_category]['title'] = $page['meta']['category_title']; // add key cat_title in temp
                        $temp_categories[$current_category]['position'] = $page['meta']['category_position']; // add key cat_pos in temp

                        if(!$page['meta']['page_ignore']) { // if page is not ignored
                            $temp_categories[$current_category]['pages'][0]['title'] = $page['title']; // p.title is stored in the page's array
                            $temp_categories[$current_category]['pages'][0]['url'] = $page['url']; // same 
                            $temp_categories[$current_category]['pages'][0]['meta'] = $page['meta']; // p.meta[] is stored
                        }
                }
            }

            foreach($pages as $page) { // second loop
                $current_category = $this->getCurrentCategoryFromURL($page['url']);

                if( $current_category != '' // if not empty
                    && !in_array($current_category, $ignored_categories) // if not ignored
                    && array_key_exists($current_category, $temp_categories) // if it exists in temp_cat
                    && $page['meta']['category_position'] == '' // if key cat_pos is empty (or it doesn't exist, aka it's not the index page?)
                    && !$page['meta']['page_ignore']) { // if page is not ignored
                        $temp_categories[$current_category]['pages'][$page['meta']['position']]['title'] = $page['title']; 
                        $temp_categories[$current_category]['pages'][$page['meta']['position']]['url'] = $page['url'];
                        $temp_categories[$current_category]['pages'][$page['meta']['position']]['meta'] = $page['meta'];
                }
            }

            foreach($temp_categories as $current_category) { // third loop
                if(isset($current_category['position'])) { // if key position exists (necessary?)
                    krsort($current_category['pages']); // sort reverse (descending)
                    $this->categories[$current_category['position']] = $current_category; // add cat to categories array
                }
            }

            // function dateSort($a, $b) 
            // {
            //     return strtotime($a) - strtotime($b);
            // }

            // foreach($temp_categories as $current_category) {
            //     uksort($current_category['pages'], "dateSort");
            //     $this->categories[$current_category['meta']['date']] = $current_category;
            // }

            if($this->categories_order == 'desc')
                krsort($this->categories);
            else
                ksort($this->categories);
        // }
    }

    public function onPageRendering(Twig_Environment &$twig, array &$twigVariables, &$templateName)
    {
        if($this->categories)
            $twigVariables['categories'] = $this->categories; // make this categories array available to twig
    }

    private function getCurrentCategoryFromURL($url)
    {
        $current_category = '';
        $current_category = explode('/', trim(str_replace($this->base_url, '', urldecode($url)), '/'))[0];
        $current_category = explode('%2F', trim($current_category, '?'))[0];

        return $current_category;
    }
}
