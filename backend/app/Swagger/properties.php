<?php
/**
 * 
 * @SWG\get(
 *   path="properties",
 *   summary="List Properties",
 *   operationId="properties-list",
 *   tags={"Properties"},
 *   @SWG\Response(response=200, description="successful operation"),
 * )
 * 
 * @SWG\get(
 *   path="properties/last",
 *   summary="Last Properties Insert",
 *   operationId="properties-last-insert",
 *   tags={"Properties"},
 *   @SWG\Response(response=200, description="successful operation"),
 * )
 * 
 * @SWG\Post(
 *   path="properties",
 *   summary="Created properties",
 *   operationId="properties-create",
 *   tags={"Properties"},
 *   @SWG\Parameter(in="body",name="body",description="",
 *      required=true,default="",
 *       @SWG\Schema(type="string",
 *          @SWG\Property(property="title", type="string", example="Apartamentos alugados"),
 *          @SWG\Property(property="total", type="string", example="222.096"),
 *     )),
 *   @SWG\Response(response=201, description="successful operation. User created and rescued"),
 *   @SWG\Response(response=400, description="operation not completed"),
 * )
 * 
 * @SWG\Put(
 *   path="properties/{id}",
 *   summary="Put properties",
 *   operationId="properties-put",
 *   tags={"Properties"},
 *   @SWG\Parameter(in="path", name="id", description="Properties id", type="string", required=true ),
 *   @SWG\Parameter(in="body",name="body",description="",
 *      required=true,default="",
 *       @SWG\Schema(type="string",
 *          @SWG\Property(property="title", type="string", example="Apartamentos alugados"),
 *          @SWG\Property(property="total", type="string", example="222.096"),
 *     )),
 *   @SWG\Response(response=201, description="successful operation. User created and rescued"),
 *   @SWG\Response(response=400, description="operation not completed"),
 * )
 * 
 * 
 * @SWG\Delete(
 *   path="properties/{id}",
 *   summary="Delete Properties",
 *   operationId="properties-del",
 *   tags={"Properties"},
 *   @SWG\Parameter(in="path", name="id", description="Properties id", type="string", required=true ),
 *   @SWG\Response(response=200, description="successful operation"),
 *   @SWG\Response(response=400, description="operation not completed"),
 * )
 *
 */
