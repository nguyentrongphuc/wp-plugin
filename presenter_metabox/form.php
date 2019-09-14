<div class="mbp_box gradient-one-two">
    <style scoped>
    .mbp_box{
        display: grid;
        grid-template-columns: max-content 1fr;
        grid-row-gap: 10px;
        grid-column-gap: 20px;
    }
    .mbp_field{
        display: contents;
    }
    h2.hndle{
        background-color: #007eb1;
        color:#fff!important;
        text-shadow: 0 -1px 1px #005d82,1px 0 1px #005d82,0 1px 1px #005d82,-1px 0 1px #005d82;
    }
    </style>
    <p class="meta-options mbp_field">
        <label for="mbp_insta">Instagram</label>
        <input id="mbp_insta" 
        type="text" 
        name="mbp_insta"
        value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'mbp_insta', true)); ?>">
    </p>
    <p class="meta-options mbp_field">
        <label for="mbp_email">Email address</label>
        <input id="mbp_email" 
        type="email" 
        name="mbp_email"
        value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'mbp_email', true)); ?>">
    </p>
</div>