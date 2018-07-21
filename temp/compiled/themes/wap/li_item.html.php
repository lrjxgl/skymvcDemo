 <li <?php if ($this->_var['c']['imgurl']): ?> class="hasimg"<?php endif; ?>>
            <a class="aurl" href="<?php echo R("/index.php?m=article&a=show&id=".$this->_var["c"]["id"]."");?>">
               <?php if ($this->_var['c']['imgurl']): ?> <img src="<?php echo IMAGES_SITE; ?><?php echo $this->_var['c']['imgurl']; ?>.100x100.jpg"/><?php endif; ?>
                <dl>
                    <dt><?php echo $this->_var['c']['title']; ?></dt>
                    <dd class="time"><?php echo timeago($this->_var['c']['dateline']); ?></dd>
                    <dd class="content"><?php echo $this->_var['c']['description']; ?></dd>
                     
                </dl>
            </a>
        </li>