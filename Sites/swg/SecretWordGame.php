<?php

namespace swg;


class SecretWordGame{
    private array $tab;
    public function __construct(string $secret){

        $temp = str_split($secret);
        foreach ($temp as $key =>$value)
            if($value != " ")
                $temp[$key] = "?";

        $this->tab = array(
            'word'  => str_split($secret),
            'win' => false,
            'result' => join($temp),
        );

    }

    public function try(?array $word=null): array{

        if($word == $this->tab['word'])
            $this->tab['win'] = true;

        $temp = str_split($this->tab['result']);

        foreach ($this->tab['word'] as $key =>$value) {
            if(array_key_exists($key, $word) && $word[$key] == $this->tab['word'][$key]) {
                $temp[$key] = $value;
            }
        }


        $this->tab['result'] =  join($temp);
//        var_dump($temp);

        return $this->tab;
    }

    public function generateInput(?array $response): void{?>
        <form action="index.php" method="post" class="form">
            <div class="form-input">
                <?php


                    foreach ( $response as $key =>$value) {
                        if($value== "?") {
                            echo '<input type="text" name="mot['.$key.']" class="mot" value="" maxlength="1">';
                        }
                        else if ($value ==" ")
                            echo '<input type="text" class="mot-espace" name="mot['.$key.']" value=" " maxlength="1"> ';
                        else
                            echo '<input type="text" class="mot-espace" name="mot['.$key.']" value="'.$value.'" maxlength="1"> ';
                    }
                ?>
            </div>
                <input type="submit" value="TRY!" class="btn" method="post">

        </form>




        <?php }
        public function generateWin() : void{?>

            <div class="motCache">
                <?php echo join($this->tab['word'])?>
            </div>
            <div class="gagne">
                !!! YOU WIN !!!
            </div>
        <?php }
}

