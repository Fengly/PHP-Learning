<?php
//000000000000s:371:"SELECT count(id) FROM dwin_project_table as t1 WHERE ( round(( SELECT count(tt4.id) as comple FROM dwin_task_table as tt4 WHERE ( tt4.id IN(( SELECT tt1.task_id as id FROM dwin_task_main_table as tt1 WHERE ( tt1.pro_id=t1.id )  )) and tt4.status=51 )  )/( SELECT count(tt5.id) as total FROM dwin_task_main_table as tt5 WHERE ( tt5.pro_id=t1.id )  )*100,0)=100 ) LIMIT 1  ";
?>