=== Row Column Testimonials with widget ===
Contributors: bijon
Tags: testimonial, Testimonial, testimonials, Testimonials, widget,  Best testimonial slider, Responsive testimonial slider, client testimonial slider, easy testimonial slider, testimonials with widget, wordpress testimonial with widget, testimonial rotator, testimonial slider, Testimonial slider , testimonial with shortcode, client testimonial, client, customer, quote, shortcodes
Requires at least: 3.1
Tested up to: 4.5.2
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A quick, easy way to add and display responsive, clean client's testimonial on your website using a shortcode or a widget.

== Description ==
Many CMS site needs to display client's testimonial on their website. RC Testimonial Plugin with Widget allow you to add testimonial
from wp-admin side same like you add post, which allows you to display testimonials on your website the easy way.
You can quickly add your testimonials with their authors, jobs, pictures, pictures size, Website URL and Position.

**This testimonial plugin contain two shortcode**
<code>[rct_testimonials] and [rct_testimonials_slider]</code>
Where you can display testimonial in list view, in grid view and slider testimonial with responsive. You can also select design theme from "RC Testimonials -> Designs".


**Please make sure that Permalink link should not be "/testimonial" Otherwise all your Testimonials will go to archive page. You can give it other name like "/testimonials, /our-testimonial, /what-our-say etc"**

This plugin creates a testimonial and a testimonial rotator/testimonial slider custom post type, complete with WordPress admin fields for adding testimonials. It includes a Widget and Shortcode to display the testimonials.

= Here is the Testimonial shortcode example =

<code>[rct_testimonials]</code>

If you want to display Testimonial by category then use this short code 
<code>[rct_testimonials  category="category_ID"]</code>

If you want to display Testimonial using slider then use this short code 
<code>[rct_testimonials_slider limit="2" slides_column="2"
 slides_scroll="2" dots="false" arrows="false" autoplay="true"
 autoplay_interval="100" speed="5000" ]</code>

= Shortcode Examples =

<code>
1. Simple list/Grid view
[rct_testimonials] OR [rct_testimonials per_row="2"]

2. Slider (per row one/per row two)
[rct_testimonials_slider] OR [rct_testimonials_slider slides_column="2"]</code>

= Use Following Testimonial parameters with shortcode =
<code>[rct_testimonials]</code>
* **limit:**
[rct_testimonials limit="5"] ( ie Display 5 testimonials on your website )
* **design:**
[rct_testimonials design="design-1"] ( ie Select the design for testimonial. Values are design-1, design-2, design-3, design-4 )
* **Grid:**
[rct_testimonials per_row="2"]( ie Display your testimonials by Grid view )
* **orderby:**
[rct_testimonials orderby="title"] ( ie Order your testimonials by "title" OR "post_date" OR "none" OR "name" OR "rand" OR "ID" )
* **order:**
[rct_testimonials order="ASC"] ( ie Order your testimonials by "ASC" OR "DESC" )
* **id:**
[rct_testimonials id="testimonail_id"] ( ie Display testimonials by their ID )
* **Display by category**
[rct_testimonials  category="category_ID"] ( ie Display testimonials by their category ID )
* **Display client:**
[rct_testimonials display_client="false"] ( Display Client name OR: You can use "true" OR "false")
* **Display job title:**
[rct_testimonials display_job="false"] ( Display Client job title : You can use "true" OR "false")
* **Display company name:**
[rct_testimonials display_company="false"] ( Display Client company name : You can use "true" OR "false")
* **Display avatar:**
[rct_testimonials display_avatar="false"] ( Display Client avatar : You can use "true" OR "false")
* **Avatar size and style:**
[rct_testimonials size="150" image_style="square"] (Set size of Client avatar and style - square, circle )
* **Display Quotes:**
[rct_testimonials display_quotes="false"] ( Display Quotes: You can use "true" OR "false")


= Use Following Testimonial Slider parameters with shortcode =
<code>[rct_testimonials_slider]</code>
* **Slide columns for testimonial rotator:**
[rct_testimonials_slider slides_column="2"] (Display no of columns in testimonial rotator )
* **design:**
[rct_testimonials_slider design="design-1"] ( ie Select the design for testimonial. Values are design-1, design-2, design-3, design-4 )
* **Number of testimonial slides at a time:**
[rct_testimonials_slider slides_scroll="2"] (Controls number of testimonial rotate at a time)
* **Pagination and arrows:**
[rct_testimonials_slider dots="false" arrows="false"]
* **Autoplay and Autoplay Interval:**
[rct_testimonials_slider autoplay="true" autoplay_interval="100"]
* **Testimonials Slide Speed:**
[rct_testimonials_slider speed="3000"]
* **limit:**
[rct_testimonials_slider limit="5"] ( ie Display 5 testimonials on your website )
* **orderby:**
[rct_testimonials_slider orderby="title"] (ie Order your testimonials by "title" OR "post_date" OR "none" OR "name" OR "rand" OR "ID" )
* **order:**
[rct_testimonials_slider order="ASC"] ( ie Order your testimonials by "ASC" OR "DESC" )
* **id:**
[rct_testimonials_slider id="testimonail_id"] ( ie Display testimonials by their ID )
* **Display  by category**
[rct_testimonials_slider  category="category_ID"] ( ie Display testimonials by their category ID )
* **Display client:**
[rct_testimonials_slider display_client="false"] ( Display Client name OR: You can use "true" OR "false")
* **Display job title:**
[rct_testimonials_slider display_job="false"] ( Display Client job title : You can use "true" OR "false")
* **Display company name:**
[rct_testimonials_slider display_company="false"] ( Display Client company name : You can use "true" OR "false")
* **Display avatar:**
[rct_testimonials_slider display_avatar="false"] ( Display Client avatar : You can use "true" OR "false")
* **Avatar size and style:**
[rct_testimonials_slider size="150" image_style="square"] (Set size of Client avatar and style - square, circle )
* **Display Quotes:**
[rct_testimonials display_quotes="false"] ( Display Quotes: You can use "true" OR "false")

= Here is Template code =
<code><?php echo do_shortcode('[rct_testimonials]'); ?> </code>
<code><?php echo do_shortcode('[rct_testimonials_slider]'); ?> </code>

= Available fields : =
* Title
* Testimonials Content
* Job Title
* Company
* Website URL
* Picture

= New Features include: =
* Added 4 New Designs.
* Display Testimonial categories wise.
* Display Testimonial on home page with limit <code>[rct_testimonials limit="1" ]</code> 
* Adding a Random Testimonial to Your Page.
* Responsive.
* Display testimonials using an easy testimonial widget.
* Add Client image.

= Pro Features include: =
> <strong>Premium Version</strong><br>
>
> * Added 15 New Designs.
> * Testimonial front-end form.
> * Star rating
> * Display testimonials using 15 testimonial widget designs.
> * Display Testimonial categories wise.
>
>

= Why Use Testimonials? =
* The web has made it easier for consumers to get recommendations not only from friends, but to see secure, verified Testimonial from people all over the world.
* Testimonials help potential customers get to know that you are a credible business.
* Testimonials, when used effectively, are a great tool to increase conversions rates on your website!




== Installation ==

1. Upload the 'RC Testimonial Plugin with Widget' folder to the '/wp-content/plugins/' directory.
2. Activate the "RC Testimonial Plugin with Widget" list plugin through the 'Plugins' menu in WordPress.
3. Add a new page and add this short code 
<code>[rct_testimonials]</code>
4. If you want to display Testimonial using slider then use this short code 
<code>[rct_testimonials_slider]</code>
5. Here is Template code 
<code><?php echo do_shortcode('[rct_testimonials]'); ?> </code>
6. If you want to display Testimonial using slider then use this template code
<code><?php echo do_shortcode('[rct_testimonials_slider]'); ?> </code>

== Screenshots ==

1. Simple list view
2. Grid view
3. Slider (per row one)
4. Slider (per row two)
5. all Testimonials
6. Creating testimonials (admin view)
7. Widget Setting
