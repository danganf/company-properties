<?php
/**
 * @SWG\Post(
 *   path="properties",
 *   summary="Created properties",
 *   operationId="properties-create",
 *   tags={"Properties"},
 *   @SWG\Parameter(in="body",name="body",description="
 *      Atributos 'price' pode ser enviado formatado na moeda brasileira ou americana
 *      Atributos 'action' é um valor enum ['available', 'sold', 'rented', 'unavailable']",
 *      required=true,default="",
 *       @SWG\Schema(type="string",
 *          @SWG\Property(property="code", type="string", example="123"),
 *          @SWG\Property(property="title", type="string", example="Excelente apartamento"),
 *          @SWG\Property(property="price", type="string", example="98000.44"),
 *          @SWG\Property(property="action", type="string", example="available" ),
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
 *   @SWG\Parameter(in="body",name="body",description="
 *      Atributos 'price' pode ser enviado formatado na moeda brasileira ou americana
 *      Atributos 'action' é um valor enum ['available', 'sold', 'rented', 'unavailable']",
 *      required=true,default="",
 *       @SWG\Schema(type="string",
 *          @SWG\Property(property="code", type="string", example="123"),
 *          @SWG\Property(property="title", type="string", example="Excelente apartamento"),
 *          @SWG\Property(property="price", type="string", example="98000.44"),
 *          @SWG\Property(property="action", type="string", example="available" ),
 *     )),
 *   @SWG\Response(response=201, description="successful operation. User created and rescued"),
 *   @SWG\Response(response=400, description="operation not completed"),
 * )
 * 
 * @SWG\Patch(
 *   path="properties/{id}",
 *   summary="Patch properties",
 *   operationId="properties-patch",
 *   tags={"Properties"},
 *   @SWG\Parameter(in="path", name="id", description="Properties id", type="string", required=true ),
 *   @SWG\Parameter(in="body",name="body",description="
 *      Atributos 'action' é um valor enum ['available', 'sold', 'rented', 'unavailable']",
 *      required=true,default="",
 *       @SWG\Schema(type="string",
 *          @SWG\Property(property="action", type="string", example="available" ),
 *     )),
 *   @SWG\Response(response=201, description="successful operation. User created and rescued"),
 *   @SWG\Response(response=400, description="operation not completed"),
 * )
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
