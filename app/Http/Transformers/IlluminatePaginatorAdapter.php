<?php
/**
 * Created by PhpStorm.
 * User: Dini
 * Date: 19/02/2020
 * Time: 13:07
 */

namespace App\Http\Transformers;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Pagination\Paginator;
use League\Fractal\Pagination\PaginatorInterface;


class IlluminatePaginatorAdapter implements PaginatorInterface
{
    protected $paginator;
    /**
     * Get the current page.
     *
     * @return int
     */
    public function __construct(Paginator $paginator)
    {
        $this->paginator = $paginator;
    }

    public function getCurrentPage()
    {
        // TODO: Implement getCurrentPage() method.
    }

    /**
     * Get the last page.
     *
     * @return int
     */
    public function getLastPage()
    {
        // TODO: Implement getLastPage() method.
    }

    /**
     * Get the total.
     *
     * @return int
     */
    public function getTotal()
    {
        // TODO: Implement getTotal() method.
    }

    /**
     * Get the count.
     *
     * @return int
     */
    public function getCount()
    {
        // TODO: Implement getCount() method.
    }

    /**
     * Get the number per page.
     *
     * @return int
     */
    public function getPerPage()
    {
        // TODO: Implement getPerPage() method.
    }

    /**
     * Get the url for the given page.
     *
     * @param int $page
     *
     * @return string
     */
    public function getUrl($page)
    {
        // TODO: Implement getUrl() method.
    }
}