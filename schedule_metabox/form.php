<div class="mbs_box gradient-one-two">
    <style scoped>
    .mbs_box{
        display: grid;
        grid-template-columns: max-content 1fr;
        grid-row-gap: 10px;
        grid-column-gap: 20px;
    }
    .mbs_field{
        display: contents;
    }
    h2.hndle{
        background-color: #007eb1;
        color:#fff!important;
        text-shadow: 0 -1px 1px #005d82,1px 0 1px #005d82,0 1px 1px #005d82,-1px 0 1px #005d82;
    }
    </style>
    <p class="meta-options mbs_field">
        <label for="mbs_date">Date and Time</label>
        <input id="mbs_date" 
        type="text" 
        name="mbs_date"
        value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'mbs_date', true)); ?>">
    </p>
</div>