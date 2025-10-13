<?php
if (!class_exists('Northway_Blog')) {
    class Northway_Blog
    {

        public function get_archive_meta($post_id = 0)
        {
            $post_author_on = northway()->get_theme_opt('post_author_on', true);
            $post_comments_on = northway()->get_theme_opt('post_comments_on', true);
            $postID = get_the_ID();
            $post = get_post($postID);
            $author_id = $post->post_author;
            $author = get_user_by('ID', get_post_field('post_author', $postID));
            if ($post_author_on || $post_date_on || $post_comments_on) : ?>
                <div class="post-metas">
                    <div class="meta-inner align-items-center">
                        <?php if ($post_author_on) : ?>
                            <div class="pxl-item--author">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" viewBox="0 0 13 15" fill="none">
                                    <path d="M2.67524 3.5321C2.67524 2.83267 2.88265 2.14895 3.27123 1.5674C3.65981 0.985845 4.21212 0.532579 4.8583 0.264919C5.50449 -0.0027402 6.21554 -0.0727722 6.90153 0.0636795C7.58752 0.200131 8.21764 0.536938 8.71221 1.03151C9.20678 1.52608 9.54359 2.1562 9.68004 2.84219C9.81649 3.52818 9.74646 4.23922 9.4788 4.88541C9.21114 5.5316 8.75787 6.08391 8.17632 6.47249C7.59477 6.86107 6.91104 7.06847 6.21162 7.06847C5.27404 7.0674 4.37517 6.69448 3.7122 6.03151C3.04924 5.36855 2.67631 4.46968 2.67524 3.5321ZM12.1224 12.3048C12.0503 11.999 11.9505 11.7004 11.8243 11.4127C10.9236 9.35651 8.77346 8.07887 6.21162 8.07887C3.3032 8.07887 0.933326 9.75814 0.313956 12.2568C0.258647 12.4805 0.254933 12.7139 0.303095 12.9392C0.351258 13.1646 0.450036 13.376 0.591958 13.5575C0.733879 13.7391 0.915226 13.886 1.12228 13.9871C1.32934 14.0882 1.55668 14.1409 1.78711 14.1412H10.6381C10.8696 14.1417 11.0981 14.0895 11.3064 13.9885C11.5146 13.8875 11.6971 13.7403 11.84 13.5582C11.979 13.3844 12.0767 13.1812 12.1257 12.9641C12.1746 12.7469 12.1735 12.5215 12.1224 12.3048Z" fill="currentColor" />
                                </svg>
                                <?php echo esc_html__('By: ', 'northway') . ' <span>' . esc_html(get_the_author_meta('display_name', $author_id)) . '</span>'; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($post_comments_on) : ?>
                            <span class="post-comments  align-items-center">
                                <a href="<?php comments_link(); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="13" viewBox="0 0 15 13" fill="none">
                                        <path d="M7.22371 -0.00366188C6.01107 -0.00395518 4.82032 0.281169 3.77445 0.822262C2.72858 1.36336 1.8655 2.1408 1.27435 3.0743C0.683208 4.0078 0.385426 5.06352 0.411763 6.13241C0.438101 7.2013 0.787603 8.24462 1.42417 9.15461L0.884854 11.7601C0.869003 11.8385 0.874829 11.9191 0.901838 11.995C0.928847 12.071 0.976241 12.1401 1.04 12.1965C1.09177 12.241 1.15303 12.276 1.22024 12.2995C1.28745 12.323 1.35928 12.3345 1.43156 12.3333H1.54238L5.11815 11.6819C5.79339 11.901 6.50449 12.022 7.22371 12.0402C9.03518 12.0402 10.7725 11.4057 12.0534 10.2764C13.3343 9.14707 14.0539 7.61537 14.0539 6.01826C14.0539 4.42115 13.3343 2.88945 12.0534 1.76012C10.7725 0.630788 9.03518 -0.00366185 7.22371 -0.00366188ZM3.71444 6.17784C3.71444 6.01681 3.7686 5.85939 3.87007 5.72549C3.97155 5.59159 4.11578 5.48724 4.28452 5.42561C4.45327 5.36398 4.63895 5.34786 4.81809 5.37928C4.99724 5.41069 5.16179 5.48824 5.29094 5.60211C5.42009 5.71598 5.50805 5.86106 5.54368 6.019C5.57931 6.17694 5.56102 6.34065 5.49113 6.48943C5.42123 6.63821 5.30286 6.76537 5.151 6.85484C4.99913 6.9443 4.82058 6.99206 4.63793 6.99206C4.393 6.99206 4.15811 6.90627 3.98492 6.75358C3.81173 6.60088 3.71444 6.39379 3.71444 6.17784ZM6.30022 6.17784C6.30022 6.01681 6.35438 5.85939 6.45585 5.72549C6.55733 5.59159 6.70156 5.48724 6.87031 5.42561C7.03905 5.36398 7.22474 5.34786 7.40388 5.37928C7.58302 5.41069 7.74757 5.48824 7.87672 5.60211C8.00587 5.71598 8.09383 5.86106 8.12946 6.019C8.16509 6.17694 8.1468 6.34065 8.07691 6.48943C8.00701 6.63821 7.88864 6.76537 7.73678 6.85484C7.58491 6.9443 7.40636 6.99206 7.22371 6.99206C6.97879 6.99206 6.74389 6.90627 6.5707 6.75358C6.39751 6.60088 6.30022 6.39379 6.30022 6.17784ZM9.80949 6.99206C9.62684 6.99206 9.44829 6.9443 9.29643 6.85484C9.14456 6.76537 9.02619 6.63821 8.9563 6.48943C8.8864 6.34065 8.86811 6.17694 8.90374 6.019C8.93938 5.86106 9.02733 5.71598 9.15648 5.60211C9.28564 5.48824 9.45019 5.41069 9.62933 5.37928C9.80847 5.34786 9.99415 5.36398 10.1629 5.42561C10.3316 5.48724 10.4759 5.59159 10.5773 5.72549C10.6788 5.85939 10.733 6.01681 10.733 6.17784C10.733 6.39379 10.6357 6.60088 10.4625 6.75358C10.2893 6.90627 10.0544 6.99206 9.80949 6.99206Z" fill="currentColor" />
                                    </svg>
                                    <span><?php comments_number(esc_html__('No Comments', 'northway'), esc_html__(' 1 Comment', 'northway'), esc_html__('%  Comments', 'northway')); ?></span>
                                </a>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif;
        }

        public function get_archive_meta_2($post_id = 0)
        {
            $postID = get_the_ID();
            $post = get_post($postID);
            $author_id = $post->post_author;
            $author = get_user_by('ID', get_post_field('post_author', $postID));
            $post_comments_on = northway()->get_theme_opt('post_comments_on', true);
            ?>
            <div class="pxl-post-meta-2">
                <div class="pxl-post-meta-2-inner ">
                    <div class="pxl-post-meta-2-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                            <path d="M7.04719 -0.00427246C3.18491 -0.00427246 0.0429688 3.13767 0.0429688 6.99995C0.0429688 10.8622 3.18491 14.0042 7.04719 14.0042C10.9095 14.0042 14.0514 10.8622 14.0514 6.99995C14.0514 3.13767 10.9095 -0.00427246 7.04719 -0.00427246ZM10.3783 10.6228C10.2645 10.7367 10.1151 10.7939 9.96565 10.7939C9.81624 10.7939 9.66672 10.7367 9.553 10.6228L6.63454 7.70447C6.52478 7.59535 6.46354 7.44701 6.46354 7.29183V3.49784C6.46354 3.17507 6.72496 2.91419 7.04719 2.91419C7.36942 2.91419 7.63084 3.17507 7.63084 3.49784V7.05018L10.3783 9.79753C10.6065 10.0258 10.6065 10.3946 10.3783 10.6228Z" fill="currentColor" />
                        </svg>
                        <span class="pxl-post-meta-2-date">
                            <?php echo get_the_date('F d, Y'); ?>
                        </span>
                    </div>
                    <div class="pxl-post-meta-2-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" viewBox="0 0 13 15" fill="none">
                            <path d="M2.67524 3.5321C2.67524 2.83267 2.88265 2.14895 3.27123 1.5674C3.65981 0.985845 4.21212 0.532579 4.8583 0.264919C5.50449 -0.0027402 6.21554 -0.0727722 6.90153 0.0636795C7.58752 0.200131 8.21764 0.536938 8.71221 1.03151C9.20678 1.52608 9.54359 2.1562 9.68004 2.84219C9.81649 3.52818 9.74646 4.23922 9.4788 4.88541C9.21114 5.5316 8.75787 6.08391 8.17632 6.47249C7.59477 6.86107 6.91104 7.06847 6.21162 7.06847C5.27404 7.0674 4.37517 6.69448 3.7122 6.03151C3.04924 5.36855 2.67631 4.46968 2.67524 3.5321ZM12.1224 12.3048C12.0503 11.999 11.9505 11.7004 11.8243 11.4127C10.9236 9.35651 8.77346 8.07887 6.21162 8.07887C3.3032 8.07887 0.933326 9.75814 0.313956 12.2568C0.258647 12.4805 0.254933 12.7139 0.303095 12.9392C0.351258 13.1646 0.450036 13.376 0.591958 13.5575C0.733879 13.7391 0.915226 13.886 1.12228 13.9871C1.32934 14.0882 1.55668 14.1409 1.78711 14.1412H10.6381C10.8696 14.1417 11.0981 14.0895 11.3064 13.9885C11.5146 13.8875 11.6971 13.7403 11.84 13.5582C11.979 13.3844 12.0767 13.1812 12.1257 12.9641C12.1746 12.7469 12.1735 12.5215 12.1224 12.3048Z" fill="currentColor" />
                        </svg>
                        <span class="pxl-post-meta-2-author">
                            <?php echo esc_html__('By: ', 'northway') . ' <span>' . esc_html(get_the_author_meta('display_name', $author_id)) . '</span>'; ?>
                        </span>
                    </div>
                    <span class="pxl-post-meta-2-item  align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="13" viewBox="0 0 15 13" fill="none">
                            <path d="M7.22371 -0.00366188C6.01107 -0.00395518 4.82032 0.281169 3.77445 0.822262C2.72858 1.36336 1.8655 2.1408 1.27435 3.0743C0.683208 4.0078 0.385426 5.06352 0.411763 6.13241C0.438101 7.2013 0.787603 8.24462 1.42417 9.15461L0.884854 11.7601C0.869003 11.8385 0.874829 11.9191 0.901838 11.995C0.928847 12.071 0.976241 12.1401 1.04 12.1965C1.09177 12.241 1.15303 12.276 1.22024 12.2995C1.28745 12.323 1.35928 12.3345 1.43156 12.3333H1.54238L5.11815 11.6819C5.79339 11.901 6.50449 12.022 7.22371 12.0402C9.03518 12.0402 10.7725 11.4057 12.0534 10.2764C13.3343 9.14707 14.0539 7.61537 14.0539 6.01826C14.0539 4.42115 13.3343 2.88945 12.0534 1.76012C10.7725 0.630788 9.03518 -0.00366185 7.22371 -0.00366188ZM3.71444 6.17784C3.71444 6.01681 3.7686 5.85939 3.87007 5.72549C3.97155 5.59159 4.11578 5.48724 4.28452 5.42561C4.45327 5.36398 4.63895 5.34786 4.81809 5.37928C4.99724 5.41069 5.16179 5.48824 5.29094 5.60211C5.42009 5.71598 5.50805 5.86106 5.54368 6.019C5.57931 6.17694 5.56102 6.34065 5.49113 6.48943C5.42123 6.63821 5.30286 6.76537 5.151 6.85484C4.99913 6.9443 4.82058 6.99206 4.63793 6.99206C4.393 6.99206 4.15811 6.90627 3.98492 6.75358C3.81173 6.60088 3.71444 6.39379 3.71444 6.17784ZM6.30022 6.17784C6.30022 6.01681 6.35438 5.85939 6.45585 5.72549C6.55733 5.59159 6.70156 5.48724 6.87031 5.42561C7.03905 5.36398 7.22474 5.34786 7.40388 5.37928C7.58302 5.41069 7.74757 5.48824 7.87672 5.60211C8.00587 5.71598 8.09383 5.86106 8.12946 6.019C8.16509 6.17694 8.1468 6.34065 8.07691 6.48943C8.00701 6.63821 7.88864 6.76537 7.73678 6.85484C7.58491 6.9443 7.40636 6.99206 7.22371 6.99206C6.97879 6.99206 6.74389 6.90627 6.5707 6.75358C6.39751 6.60088 6.30022 6.39379 6.30022 6.17784ZM9.80949 6.99206C9.62684 6.99206 9.44829 6.9443 9.29643 6.85484C9.14456 6.76537 9.02619 6.63821 8.9563 6.48943C8.8864 6.34065 8.86811 6.17694 8.90374 6.019C8.93938 5.86106 9.02733 5.71598 9.15648 5.60211C9.28564 5.48824 9.45019 5.41069 9.62933 5.37928C9.80847 5.34786 9.99415 5.36398 10.1629 5.42561C10.3316 5.48724 10.4759 5.59159 10.5773 5.72549C10.6788 5.85939 10.733 6.01681 10.733 6.17784C10.733 6.39379 10.6357 6.60088 10.4625 6.75358C10.2893 6.90627 10.0544 6.99206 9.80949 6.99206Z" fill="currentColor" />
                        </svg>
                        <a href="<?php comments_link(); ?>">
                            <span><?php comments_number(esc_html__('No Comments', 'northway'), esc_html__(' 1 Comment', 'northway'), esc_html__('%  Comments', 'northway')); ?></span>
                        </a>
                    </span>
                </div>
            </div>
        <?php }

        public function get_archive_meta_3($post_id = 0)
        {
            $postID = get_the_ID();
            $post = get_post($postID);
            $author_id = $post->post_author;
            $author = get_user_by('ID', get_post_field('post_author', $postID));
            $post_comments_on = northway()->get_theme_opt('post_comments_on', true);
        ?>
            <div class="pxl-post-meta-3">
                <div class="pxl-post-meta-3-inner ">
                    <div class="pxl-post-meta-3-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                            <path d="M7.04719 -0.00427246C3.18491 -0.00427246 0.0429688 3.13767 0.0429688 6.99995C0.0429688 10.8622 3.18491 14.0042 7.04719 14.0042C10.9095 14.0042 14.0514 10.8622 14.0514 6.99995C14.0514 3.13767 10.9095 -0.00427246 7.04719 -0.00427246ZM10.3783 10.6228C10.2645 10.7367 10.1151 10.7939 9.96565 10.7939C9.81624 10.7939 9.66672 10.7367 9.553 10.6228L6.63454 7.70447C6.52478 7.59535 6.46354 7.44701 6.46354 7.29183V3.49784C6.46354 3.17507 6.72496 2.91419 7.04719 2.91419C7.36942 2.91419 7.63084 3.17507 7.63084 3.49784V7.05018L10.3783 9.79753C10.6065 10.0258 10.6065 10.3946 10.3783 10.6228Z" fill="currentColor" />
                        </svg>
                        <span class="pxl-post-meta-3-date">
                            <?php echo get_the_date('F d, Y'); ?>
                        </span>
                    </div>
                    <div class="pxl-post-meta-3-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" viewBox="0 0 13 15" fill="none">
                            <path d="M2.67524 3.5321C2.67524 2.83267 2.88265 2.14895 3.27123 1.5674C3.65981 0.985845 4.21212 0.532579 4.8583 0.264919C5.50449 -0.0027402 6.21554 -0.0727722 6.90153 0.0636795C7.58752 0.200131 8.21764 0.536938 8.71221 1.03151C9.20678 1.52608 9.54359 2.1562 9.68004 2.84219C9.81649 3.52818 9.74646 4.23922 9.4788 4.88541C9.21114 5.5316 8.75787 6.08391 8.17632 6.47249C7.59477 6.86107 6.91104 7.06847 6.21162 7.06847C5.27404 7.0674 4.37517 6.69448 3.7122 6.03151C3.04924 5.36855 2.67631 4.46968 2.67524 3.5321ZM12.1224 12.3048C12.0503 11.999 11.9505 11.7004 11.8243 11.4127C10.9236 9.35651 8.77346 8.07887 6.21162 8.07887C3.3032 8.07887 0.933326 9.75814 0.313956 12.2568C0.258647 12.4805 0.254933 12.7139 0.303095 12.9392C0.351258 13.1646 0.450036 13.376 0.591958 13.5575C0.733879 13.7391 0.915226 13.886 1.12228 13.9871C1.32934 14.0882 1.55668 14.1409 1.78711 14.1412H10.6381C10.8696 14.1417 11.0981 14.0895 11.3064 13.9885C11.5146 13.8875 11.6971 13.7403 11.84 13.5582C11.979 13.3844 12.0767 13.1812 12.1257 12.9641C12.1746 12.7469 12.1735 12.5215 12.1224 12.3048Z" fill="currentColor" />
                        </svg>
                        <span class="pxl-post-meta-3-author">
                            <?php echo esc_html__('By: ', 'northway') . ' <span>' . esc_html(get_the_author_meta('display_name', $author_id)) . '</span>'; ?>
                        </span>
                    </div>
                    <span class="pxl-post-meta-3-item  align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="13" viewBox="0 0 15 13" fill="none">
                            <path d="M7.22371 -0.00366188C6.01107 -0.00395518 4.82032 0.281169 3.77445 0.822262C2.72858 1.36336 1.8655 2.1408 1.27435 3.0743C0.683208 4.0078 0.385426 5.06352 0.411763 6.13241C0.438101 7.2013 0.787603 8.24462 1.42417 9.15461L0.884854 11.7601C0.869003 11.8385 0.874829 11.9191 0.901838 11.995C0.928847 12.071 0.976241 12.1401 1.04 12.1965C1.09177 12.241 1.15303 12.276 1.22024 12.2995C1.28745 12.323 1.35928 12.3345 1.43156 12.3333H1.54238L5.11815 11.6819C5.79339 11.901 6.50449 12.022 7.22371 12.0402C9.03518 12.0402 10.7725 11.4057 12.0534 10.2764C13.3343 9.14707 14.0539 7.61537 14.0539 6.01826C14.0539 4.42115 13.3343 2.88945 12.0534 1.76012C10.7725 0.630788 9.03518 -0.00366185 7.22371 -0.00366188ZM3.71444 6.17784C3.71444 6.01681 3.7686 5.85939 3.87007 5.72549C3.97155 5.59159 4.11578 5.48724 4.28452 5.42561C4.45327 5.36398 4.63895 5.34786 4.81809 5.37928C4.99724 5.41069 5.16179 5.48824 5.29094 5.60211C5.42009 5.71598 5.50805 5.86106 5.54368 6.019C5.57931 6.17694 5.56102 6.34065 5.49113 6.48943C5.42123 6.63821 5.30286 6.76537 5.151 6.85484C4.99913 6.9443 4.82058 6.99206 4.63793 6.99206C4.393 6.99206 4.15811 6.90627 3.98492 6.75358C3.81173 6.60088 3.71444 6.39379 3.71444 6.17784ZM6.30022 6.17784C6.30022 6.01681 6.35438 5.85939 6.45585 5.72549C6.55733 5.59159 6.70156 5.48724 6.87031 5.42561C7.03905 5.36398 7.22474 5.34786 7.40388 5.37928C7.58302 5.41069 7.74757 5.48824 7.87672 5.60211C8.00587 5.71598 8.09383 5.86106 8.12946 6.019C8.16509 6.17694 8.1468 6.34065 8.07691 6.48943C8.00701 6.63821 7.88864 6.76537 7.73678 6.85484C7.58491 6.9443 7.40636 6.99206 7.22371 6.99206C6.97879 6.99206 6.74389 6.90627 6.5707 6.75358C6.39751 6.60088 6.30022 6.39379 6.30022 6.17784ZM9.80949 6.99206C9.62684 6.99206 9.44829 6.9443 9.29643 6.85484C9.14456 6.76537 9.02619 6.63821 8.9563 6.48943C8.8864 6.34065 8.86811 6.17694 8.90374 6.019C8.93938 5.86106 9.02733 5.71598 9.15648 5.60211C9.28564 5.48824 9.45019 5.41069 9.62933 5.37928C9.80847 5.34786 9.99415 5.36398 10.1629 5.42561C10.3316 5.48724 10.4759 5.59159 10.5773 5.72549C10.6788 5.85939 10.733 6.01681 10.733 6.17784C10.733 6.39379 10.6357 6.60088 10.4625 6.75358C10.2893 6.90627 10.0544 6.99206 9.80949 6.99206Z" fill="currentColor" />
                        </svg>
                        <a href="<?php comments_link(); ?>">
                            <span><?php comments_number(esc_html__('No Comments', 'northway'), esc_html__(' 1 Comment', 'northway'), esc_html__('%  Comments', 'northway')); ?></span>
                        </a>
                    </span>
                </div>
            </div>
        <?php }

        public function get_date()
        {
            $post_date_on = northway()->get_theme_opt('post_date_on', true);
            if ($post_date_on == '0') return;
        ?>
            <div class="pxl-post--date">
                <span class="pxl-post--date-day"><?php echo get_the_date('d') ?></span>
                <span class="pxl-post--date-month"><?php echo get_the_date('M') ?></span>
            </div>
        <?php }

        public function get_post_title()
        {
            $post_title_on = northway()->get_theme_opt('post_title_on', '0');
            if ($post_title_on == '0') return;
        ?>
            <h3 class="post-title">
                <a href="<?php echo esc_url(get_permalink()); ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_title(); ?>
                </a>
            </h3>
            <?php
        }

        public function get_excerpt()
        {
            $archive_excerpt_length = northway()->get_theme_opt('archive_excerpt_length', '17');
            $northway_the_excerpt = get_the_excerpt();
            if (!empty($northway_the_excerpt)) {
                echo wp_trim_words($northway_the_excerpt, $archive_excerpt_length, $more = null);
            } else {
                echo wp_kses_post($this->get_excerpt_more($archive_excerpt_length));
            }
        }

        public function get_excerpt_more($length = 55, $post = null)
        {
            $post = get_post($post);

            if (empty($post) || 0 >= $length) {
                return '';
            }

            if (post_password_required($post)) {
                return esc_html__('Post password required.', 'northway');
            }

            $content = apply_filters('the_content', strip_shortcodes($post->post_content));
            $content = str_replace(']]>', ']]&gt;', $content);

            $excerpt_more = apply_filters('northway_excerpt_more', '&hellip;');
            $excerpt      = wp_trim_words($content, $length, $excerpt_more);

            return $excerpt;
        }

        public function get_post_metas()
        {
            $post_author_on = northway()->get_theme_opt('post_author_on', true);
            $post_date_on = northway()->get_theme_opt('post_date_on', true);
            $post_comments_on = northway()->get_theme_opt('post_comments_on', true);
            $postID = get_the_ID();
            $post = get_post($postID);
            $author_id = $post->post_author;
            $author = get_user_by('ID', get_post_field('post_author', $postID));
            if ($post_author_on || $post_date_on || $post_comments_on) : ?>
                <div class="post-metas">
                    <div class="meta-inner align-items-center">
                        <?php if ($post_author_on) : ?>
                            <div class="pxl-item--author">
                                <?php echo get_avatar($author_id, 'thumbnail'); ?>
                                <?php echo esc_html__('Post by', 'northway') . ' <span>' . esc_html(get_the_author_meta('display_name', $author_id)) . '</span>'; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($post_comments_on) : ?>
                            <span class="post-comments  align-items-center">
                                <a href="<?php comments_link(); ?>">
                                    <span><?php comments_number(esc_html__('No Comments', 'northway'), esc_html__(' 1 Comment', 'northway'), esc_html__('%  Comments', 'northway')); ?></span>
                                </a>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif;
        }

        public function northway_set_post_views($postID)
        {
            $countKey = 'post_views_count';
            $count    = get_post_meta($postID, $countKey, true);
            if ($count == '') {
                $count = 0;
                delete_post_meta($postID, $countKey);
                add_post_meta($postID, $countKey, '0');
            } else {
                $count++;
                update_post_meta($postID, $countKey, $count);
            }
        }

        public function get_post_tags()
        {
            $post_tag = northway()->get_theme_opt('post_tag', true);
            if ($post_tag != '1') return;
            $tags_list = get_the_tag_list();
            if ($tags_list) {
                echo '<div class="post-tags ">';
                printf('%2$s', '', $tags_list);
                echo '</div>';
            }
        }

        public function get_post_category($post_id = 0)
        {
            $archive_category = northway()->get_theme_opt('archive_category', true);

            $post_category = $archive_category && has_category('', $post_id);
            $post_date = true;

            echo '<ul class="pxl-item--meta">';

            if ($post_category) {
                echo '<li class="item--category">';
                echo get_the_term_list($post_id, 'category', '', '');
                echo '</li>';
            }

            echo '</ul>';
        }

        public function get_post_share($post_id = 0)
        {
            $post_social_share = northway()->get_theme_opt('post_social_share', false);
            $share_icons = northway()->get_theme_opt('post_social_share_icon', []);
            $social_facebook = northway()->get_theme_opt('social_facebook', []);
            $social_twitter = northway()->get_theme_opt('social_twitter', []);
            $social_instagram = northway()->get_theme_opt('social_instagram', []);
            $social_linkedin = northway()->get_theme_opt('social_linkedin', []);
            if ($post_social_share != '1') return;
            $post = get_post($post_id);
            ?>
            <div class="post-shares align-items-center">
                <div class="social-share">
                    <?php if ($social_facebook): ?>
                        <a class="social-share-icon " title="<?php echo esc_attr__('Facebook', 'northway'); ?>" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_the_permalink($post_id)); ?>">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    <?php endif; ?>
                    <?php if ($social_instagram): ?>
                        <a class="social-share-icon " title="<?php echo esc_attr__('Instagram', 'northway'); ?>" target="_blank" href="https://www.instagram.com/sharer/sharer.php?u=<?php echo urlencode(get_the_permalink($post_id)); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 11 11" fill="none">
                                <path d="M5.5 3.4826C4.3868 3.4826 3.4826 4.3868 3.4826 5.5C3.4826 6.6132 4.3868 7.5196 5.5 7.5196C6.6132 7.5196 7.5196 6.6132 7.5196 5.5C7.5196 4.3868 6.6132 3.4826 5.5 3.4826Z" fill="currentColor" />
                                <path d="M8.5448 0H2.4552C1.1022 0 0 1.1022 0 2.4552V8.5448C0 9.9 1.1022 11 2.4552 11H8.5448C9.9 11 11 9.9 11 8.5448V2.4552C11 1.1022 9.9 0 8.5448 0ZM5.5 9.064C3.5354 9.064 1.936 7.4646 1.936 5.5C1.936 3.5354 3.5354 1.9382 5.5 1.9382C7.4646 1.9382 9.064 3.5354 9.064 5.5C9.064 7.4646 7.4646 9.064 5.5 9.064ZM9.1388 2.585C8.723 2.585 8.3842 2.2484 8.3842 1.8326C8.3842 1.4168 8.723 1.078 9.1388 1.078C9.5546 1.078 9.8934 1.4168 9.8934 1.8326C9.8934 2.2484 9.5546 2.585 9.1388 2.585Z" fill="currentColor" />
                            </svg>
                        </a>
                    <?php endif; ?>
                    <?php if ($social_twitter): ?>
                        <a class="social-share-icon " title="<?php echo esc_attr__('Twitter', 'northway'); ?>" target="_blank" href="https://twitter.com/intent/tweet?original_referer=<?php echo urldecode(home_url('/')); ?>&url=<?php echo urlencode(get_the_permalink($post_id)); ?>&text=<?php the_title(); ?>%20">
                            <i class="bi-twitter"></i>
                        </a>
                    <?php endif; ?>
                    <?php if ($social_linkedin): ?>
                        <a class="social-share-icon " title="<?php echo esc_attr__('Linkedin', 'northway'); ?>" target="_blank" href="https://www.linkedin.com/cws/share?url=<?php echo urlencode(get_the_permalink($post_id)); ?>">
                            <i class="bi-linkedin"></i>
                        </a>
                    <?php endif; ?>
                </div>
                <span class="label"><?php echo esc_html__('Share', 'northway'); ?> <svg xmlns="http://www.w3.org/2000/svg" width="23" height="8" viewBox="0 0 23 8" fill="none">
                        <path d="M19.5215 0.115234C19.5377 0.571204 19.9139 1.05979 20.1484 1.43359C20.3943 1.84817 20.6402 2.26268 20.9268 2.66602C21.4852 3.49876 22.0846 4.3202 22.7393 5.10449C22.7652 5.11925 22.0241 6.48532 21.957 6.48242C20.0104 6.58041 18.0374 6.66374 16.0908 6.76172C16.1983 6.75401 16.4459 6.13756 16.4902 6.05957C16.5499 5.95408 16.822 5.35488 16.8887 5.3584C17.6412 5.30446 18.405 5.29114 19.1836 5.25195C18.4262 4.89062 17.6133 4.56595 16.7969 4.30859C14.0058 3.41134 10.9787 3.17133 8.06152 3.64648C5.18528 4.11041 1.71379 5.19894 0 7.73242C0.203099 7.43518 0.490838 6.80834 0.75293 6.40723C1.74268 4.9064 3.30528 3.97098 4.94629 3.32129C9.80249 1.36883 15.4104 1.6647 20.0703 3.93262C19.847 3.5996 19.6119 3.2262 19.4033 2.86719C19.1835 2.46734 18.6781 1.90478 18.7842 1.41504C18.7582 1.40028 18.7433 1.42615 18.7285 1.45215C18.758 1.40019 18.7869 1.34786 18.8164 1.2959C18.9823 0.943308 19.2222 0.460887 19.5215 0.115234L19.5371 0.0888672C19.5382 0.0869546 19.5395 0.085032 19.541 0.0830078C19.5351 0.092646 19.5283 0.103311 19.5215 0.115234ZM19.4922 0.166992C19.4221 0.230094 19.3922 0.282016 19.3887 0.348633C19.4182 0.296702 19.4627 0.218988 19.4922 0.166992ZM19.6221 0C19.6083 0.0240219 19.5599 0.057572 19.541 0.0830078C19.5608 0.0506155 19.5793 0.0286952 19.6221 0Z" fill="#0F3714" />
                    </svg>
                </span>
            </div>
        <?php
        }

        public function get_post_nav()
        {
            $post_navigation = northway()->get_theme_opt('post_navigation', false);
            if ($post_navigation != '1') return;
            global $post;

            $previous = (is_attachment()) ? get_post($post->post_parent) : get_adjacent_post(false, '', true);
            $next     = get_adjacent_post(false, '', false);

            if (! $next && ! $previous)
                return;
        ?>
            <?php
            $next_post = get_next_post();
            $previous_post = get_previous_post();
            if (empty($previous_post) && empty($next_post)) return;

            ?>
            <div class="single-next-prev-nav row gx-0 justify-content-between align-items-center">
                <?php if (!empty($previous_post)): ?>
                    <div class="nav-next-prev prev col relative text-start">
                        <div class="nav-inner">
                            <?php previous_post_link('%link', ''); ?>
                            <div class="nav-label-wrap justify-content-center align-items-center">
                                <i class="bootstrap-icons bi-arrow-left"></i>
                            </div>
                            <div class="nav-title-wrap d-none d-sm-flex">
                                <span class="nav-label"><?php echo esc_html__('Previous Post', 'northway'); ?></span>
                                <div class="nav-title"><?php echo wp_trim_words(get_the_title($previous_post->ID), 5, '...'); ?></div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="grid-archive">
                    <a href="<?php echo get_post_type_archive_link('post'); ?>">
                        <div class="nav-archive-button">
                            <div class="archive-btn-square square-1"></div>
                            <div class="archive-btn-square square-2"></div>
                            <div class="archive-btn-square square-3"></div>
                        </div>
                    </a>
                </div>
                <?php if (!empty($next_post)) : ?>
                    <div class="nav-next-prev next col relative text-end justify-content-end">
                        <div class="nav-inner">
                            <?php next_post_link('%link', ''); ?>
                            <div class="nav-label-wrap justify-content-center align-items-center">
                                <i class="bootstrap-icons bi-arrow-right"></i>
                            </div>
                            <div class="nav-title-wrap  align-items-end d-none d-sm-flex">
                                <span class="nav-label"><?php echo esc_html__('Newer Post', 'northway'); ?></span>
                                <div class="nav-title"><?php echo wp_trim_words(get_the_title($next_post->ID), 5, '...'); ?></div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php
        }
        public function get_project_nav()
        {
            global $post;
            $previous = (is_attachment()) ? get_post($post->post_parent) : get_adjacent_post(false, '', true);
            $next     = get_adjacent_post(false, '', false);
            $link_grid = northway()->get_theme_opt('link_grid', '');
            if (! $next && ! $previous)
                return;
        ?>
            <?php
            $next_post = get_next_post();
            $previous_post = get_previous_post();

            if (!empty($next_post) || !empty($previous_post)) {
            ?>
                <div class="pxl-project--navigation">
                    <div class="pxl--items">
                        <div class="pxl--item pxl--item-prev">
                            <?php if (is_a($previous_post, 'WP_Post') && get_the_title($previous_post->ID) != '') {
                            ?>
                                <a href="<?php echo esc_url(get_permalink($previous_post->ID)); ?>"><i class="far fa-arrow-left"></i>Prev Project</a>
                            <?php } ?>
                        </div>
                        <div class="pxl--item pxl--item-grid">
                            <?php if (!empty($link_grid)) { ?>
                                <a href="<?php echo esc_url($link_grid); ?>">
                                    <span class="bl bl1"></span>
                                    <span class="bl bl2"></span>
                                    <span class="bl bl3"></span>
                                    <span class="bl bl4"></span>
                                </a>
                            <?php } ?>
                        </div>
                        <div class="pxl--item pxl--item-next">
                            <?php if (is_a($next_post, 'WP_Post') && get_the_title($next_post->ID) != '') {
                            ?>
                                <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>">Next Project <i class="far fa-arrow-right"></i> </a>
                            <?php } ?>
                        </div>
                    </div><!-- .nav-links -->
                </div>
<?php }
        }
    }
}
